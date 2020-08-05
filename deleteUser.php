<?php
session_start();

// Create connection
		$conn = mysqli_connect("localhost", "root", "", "mydb");

// Check connection
		if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				$Email=$_POST['Email'];

		$sql = "DELETE FROM mytable WHERE email='$Email'";
		
		$result = mysqli_query($conn, $sql);

		if(mysqli_query($conn, $sql))
			{
		echo '<p style="margin-left:20px;color:white;font-size:20px;font-family:Times New roman;">'."User Deleted Successfully...  ".'</p>';
				echo "<br>";
			}
		else
		{
			echo "Error deleting record: ".mysqli_error($conn);
		}
		
	
	
	mysqli_close($conn);
?>





<html>
<head>
<title>LOGIN FORM</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
body{
	background-image: url('logc.jpg');
background-size:cover;	
background-repeat:no repeat;
}


<!--
#d{
width:900;	
align:center;
margin-left:30px;	
	
}
-->
@media (min-width: 1000px) {
    .container{
        max-width: 700px;
    }
}
a:hover{
	color:pink;
}
        <link rel="stylesheet" href="login.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
</style>
        <link rel="stylesheet" href="login.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
  
<body>

<div class="container" >

  <h2 style="color:white;font-family:timenewroman;align:center;margin-top:30px">Attendence Marking System</h2>
  <form action="deleteUser.php" method="post">
    <div class="form-group">
      <label for="username"><p style="color:white;font-family:timenewroman;font-size:20px">Delete User:</p></label>
      <input type="text" class="form-control" id="Firstname" placeholder="Enter Email " name="Email" required>
    </div>
   <input type='submit' class="btn btn-primary" style='width:150px;margin-left:200px' value='Delete User' name="submit" id="login"> 
   <a href="third.php"><input type="button" class="btn btn-light" style="margin-left:20px" id="logout" value="Log Out"></a><br><br>
   
	 
  </form>
</div>

</body>
</html>
