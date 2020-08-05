<?php
session_start();
error_reporting(0);
$username=$_SESSION['user_name'];
 if($username==true)
 { }
			 else{
			 	header('location:index.php');
			 }
    echo '<h1 style="margin-left:20px;margin-top:50px;color:white;font-family:Times New roman;">'."Welcome  ".$username.'</h1>';


    $lat=$_GET["lat"];
	$lng=$_GET["lng"];
	$highlng=90.00;
    $lowlng=50.00;
    $highlat=25.00;
    $lowlat=10.00;


// Create connection
	$conn = mysqli_connect("localhost","root","","mydb");
	if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			}
    $unm=$_POST['Firstname'];
	$pass=$_POST['pass'];
		
	$sql_u = "SELECT * FROM empatt WHERE loginid='{$_SESSION['user_name']}' and atts='Present' and ddd=CURDATE()";
  	
  	$res_u = mysqli_query($conn, $sql_u);
  	  
  	if (mysqli_num_rows($res_u) > 0) {
		echo '<p style="margin-left:20px;color:white;font-size:20px;font-family:Times New roman;">'."Sorry... attendance already marked  ".'</p>';	
  	}
	
	else{
			if((time() < strtotime('4 pm')) )
			{
				if($lat < $highlat && $lat > $lowlat && $lng > $lowlng && $lng < $highlng )
	
	{
	$sql = "INSERT INTO empatt (ddd,loginid,atts)VALUES (CURTIME(),'{$_SESSION['user_name']}','Present')";

	if (mysqli_query($conn, $sql)) {
			
			echo '<p style="margin-left:20px;color:white;font-size:20px;font-family:Times New roman;">'."Attendance Marked successfully  ".'</p>';
			
			} 
	else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	else{	
	$sql = "INSERT INTO empatt (ddd,loginid,atts)VALUES (CURTIME(),'{$_SESSION['user_name']}','Absent')";
	if (mysqli_query($conn, $sql)) {
			echo '<p style="margin-left:20px;color:white;font-size:20px;font-family:Times New roman;">'."Attendance not Marked successfully  ".'</p>';
			} 
	else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		}
		}
		
		else{
			echo '<p style="margin-left:20px;color:white;font-size:20px;font-family:Times New roman;">'."Time is over for marking attendance.........  ".'</p>';
		}
		 
	}
					 
		mysqli_close($conn);
	
        
?>

<html>
<head>
<style>
body{
	background-image: url('loge.jpg');
background-size:cover;	
background-repeat:no repeat;
}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</style>
<script>
$(document).ready(function(){
  $("#logout").click(function(){
    alert("Are you sure? " );
  });
  
});
</script>
</head>
<body>
<br><br>
<div class="container">
<a href="showattendstud.php"><input type="button" class="btn btn-light" style="margin-top:10px;margin-left:20px;height:30px;width:150px" value="Show Attendance"></a>

<a href="third.php"><input type="button" id="logout" class="btn btn-light" style="margin-left:20px;margin-top:20px;height:30px;width:80px" value="Log Out"></a>


</div>
</body>
</html>