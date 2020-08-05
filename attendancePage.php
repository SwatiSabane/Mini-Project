<?php
// Start the session
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<body>

<?php

 
  // Create connection
	$conn = mysqli_connect("localhost","root","","mydb");
			if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			}
			 $unm=$_SESSION['user_name'];
			 if($unm==true)
			 {
			 }
			 else{
			 	header('location:index.php');
			 }
  			$pass=$_SESSION['pass'];
			$query = "SELECT  * FROM mytable where username='$unm' and password='$pass'";
	
	
	
	
			//$query1 = "SELECT  * FROM mytable where username='$unm' and password='$pass'";
			$res1=mysqli_query($conn,$query);
			
			
	if(mysqli_num_rows($res1)>0)
	{
		
		
	while($row = mysqli_fetch_array($res1))
	{  
		echo '<h1 style="color:white; margin-left:20px; margin-top:50px; font-family:Times New Roman;"> You have sucessfully loggedIn.....</h1>';
		echo '<p style="color:white; margin-left:20px; font-family:Times New Roman;"> Click here to mark the attendance.....</p>';
			
					
        echo '<b style="color:white;margin-left:20px">'.$row['firstname'] .'</b>';
		echo '&nbsp&nbsp&nbsp&nbsp';
        echo '<b style="color:white">'.$row['middlename'] .'</b>';
		echo '&nbsp&nbsp&nbsp&nbsp';
        echo '<b style="color:white">'.$row['lastname'].'</b>';
		echo '<br>';
		echo '<br>';
		echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'""width="200" height="200" style="margin-left:20px;><br>';
		echo "<br>"; 
		
			
	}
	}
	
?>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
	<style>
	body
	{
		background-image: url('logd.jpg');
		background-size:cover;	
		background-repeat:no repeat;
	}
	#a
	{
	
	margin-right:160px;
	}

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
<p id="demo"></p>
<button type="submit" class="btn btn-light" name="btnLogin" style="margin-left:20px" onclick="getLocation()">Mark Attendance</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="showattendstud.php"><input type="button" class="btn btn-light" style="margin-left:20px" id="show" value="Show Attendance"></a>
<a href="third.php"><input type="button" class="btn btn-light" id="logout" style="margin-left:20px" value="Log Out"></a><br><br>
 
<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {

  var lat=position.coords.latitude;
  var lng=position.coords.longitude;
  var highlng=80.00;
  var lowlng=50.00;
 var highlat=25.00;
  var lowlat=10.00;
  if(lat<highlat && lat>lowlat && lng<highlng && lng>lowlng)
  {
	   x.innerHTML="Yes";
  }
  else{
	  
	  x.innerHTML="No";
  }
  
window.location.href = "insertdata.php?lat=" + lat+ "&lng=" + lng + "&lowlat=" + lowlat + "&highlat=" + highlat + "&lowlng" + lowlng + "&highlng" + highlng;
}

</script>
<div  width="1000" height="400" id="a" style="margin-left:20px;margin-right:90px">
<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3821.8929376252463!2d74.46819131412207!3d16.68224012715044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc0e26e0a8944ed%3A0x2abc23be634e333f!2sDKTE%20Society&#39;s%20Textile%20%26%20Engineering%20Institute%20(An%20Autonomous%20Institute)!5e0!3m2!1sen!2sin!4v1586010997501!5m2!1sen!2sin"  width="1200"   height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" paddings="20px"style="margin-left:20px"></iframe><br>
</div>
</body>
</html>

