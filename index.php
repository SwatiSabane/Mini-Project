<?php
	session_start();
	$fname=$pass='';
	$nameerr1=$nameerr2=$passerr='';
	$flag = true;
	{
			if(isset($_POST['submit']))
			{	
				$fname = $_POST['Firstname'];
				$pass= $_POST['pass'];
		
				{
									if(empty($fname))
									{
										$nameerr1= "*username is compulsory";
										$flag = false;
									}
									elseif (!preg_match("/^[A-Za-z]+$/",$fname))
									{
										$nameerr2= "<span>"."Name must contain characters"."</span>"."<br>";
										$flag = false;
										
									}
									if(empty($pass))
									{
											$passerr="<span>".'<style="color:white">'."*password is compulsory"."</span>";
											$flag1=false;
									}
									$servername = "localhost";
	
// Create connection
	$conn = mysqli_connect("localhost","root","","mydb");
			if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			}
	


	$unm=$_POST['Firstname'];
	$pass=$_POST['pass'];
	
		$sql = "SELECT  * FROM mytable where username='$unm' and Role='admin' and password='$pass'";
		
		$result = mysqli_query($conn, $sql);
		$total=mysqli_num_rows($result);
	//	echo $total;
	if ($total>0) {
		$_SESSION['user_name']=$unm;
		$_SESSION['pass']=$pass;
    	header('location:attendancePageadmin.php');

	} 
	else {
				
		$sql1 = "SELECT  * FROM mytable where username='$unm' and Role='' and password='$pass'";
		
		$result1 = mysqli_query($conn, $sql1);
		$total1=mysqli_num_rows($result1);
	
	if ($total1>0) {
		$_SESSION['user_name']=$unm;
		$_SESSION['pass']=$pass;
		  echo 'alert(message successfully sent)';  //not showing an alert box.

    	header('location:attendancePage.php');
	} 
	else {
 echo '<p style="color:white; margin-left:20px; margin-top:20px; font-family:Times New Roman;"> login failed.....</p>'.$unm;
	}
	}	
	
	mysqli_close($conn);
									
				}
			}
		
	}	

	

?>

<html>
<head>
<title>Attendence Marking System</title>
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
  <p style="color:white;font-family:timenewroman;align:center;font-size:25px;margin-top:30px">Login Here</p>
  <form action="index.php" method="post">
    <div class="form-group">
      <label for="username"><p style="color:white;font-family:timenewroman;font-size:20px">Username:</p></label>
      <input type="text" class="form-control" id="Firstname" placeholder="Enter username" name="Firstname" required><?php echo $nameerr1; ?></p><?php echo $nameerr2;?>
    </div>
    <div class="form-group">
      <label for="pwd"><p style="color:white;font-family:timenewroman;font-size:20px" required>Password:</p></label>
      <input type="password" class="form-control" id="pass" placeholder="Enter password" name="pass"><?php echo $passerr; ?></p>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"><p style="color:white;font-family:timenewroman"> Remember me</p>
      </label>
    </div>

   <input type='submit' class="btn btn-primary" style='width:150px;margin-left:200px' value='Login' name="submit" id="login"> 
   
	 <a href="forgotpass.php"><p style='color:white;margin-left:210px'>Forgot password ?</p></a>
  </form>
</div>

</body>

</html>

