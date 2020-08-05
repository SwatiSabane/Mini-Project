
<?php
	session_start();
	$email=$pass=$conpass='';
	$nameerr1=$nameerr2=$passerr=$conpasserr='';
	$flag = true;
	{
			if(isset($_POST['submit']))
			{	
				$fname = $_POST['Firstname'];
				$pass= $_POST['pass'];
		
				{                   if (empty($email)) {
							               $emailErr = "Email is required";
							               $flag=false;
						            } 
							
									if(empty($pass))
									{
											$passerr="<span>"."*password is compulsory"."</span>";
											$flag1=false;
									}
									if(empty($conpass))
									{
											$conpasserr="<span>"."*Confirm password is compulsory"."</span>";
											$flag1=false;
									}
									$servername = "localhost";
	
// Create connection
	$conn = mysqli_connect("localhost","root","","mydb");
			if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			}
	


	$email=$_POST['email'];
	$pass=$_POST['pass'];
	
	
		$sql = "Update mytable SET password='$pass' WHERE email='$email'";
		
		$result = mysqli_query($conn, $sql);

		if(mysqli_query($conn, $sql))
			{
				echo "Record Updated Successfully.";
				echo "<br>";
				header('location:index.php');
			}
		else
		{
			echo "Error updating record: ".mysqli_error($conn);
		}
	mysqli_close($conn);
									
				}
			}
		
	}	

	

?>

<html>
<head>
<title>LOGIN FORM</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style>
body{
	background-image: url('logf.png');
background-size:cover;	
background-repeat:no repeat;
}

#a{
background: rgba(0,0, 100, 0.1);
font-size:15px;
height:350px;
width:400px;
align:center;
margin-left:480px;
font-family:verdana;
margin-top:50px;
}
#b{
	color:white;
	margin-top:80px;
	margin:40px;
}
@media (min-width: 1000px) {
    .container{
        max-width: 700px;
    }
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
  
<body>

<div class="container" style="width:50%" >

  <h2 style="color:white;font-family:timenewroman;align:center;margin-top:30px">Forgot Password</h2>
  <form action="forgotpass.php" method="post">
    <div class="form-group">
      <label for="username"><p style="color:white;font-family:timenewroman;font-size:20px">Email:</p></label>
      <input type='email' name="email" class="form-control" required><?php echo $nameerr1; ?><?php echo $nameerr2;?>
    </div>
    <div class="form-group">
      <label for="pwd"><p style="color:white;font-family:timenewroman;font-size:20px">Password:</p></label>
      <input class="form-control"  type='password' name="pass" required><?php echo $passerr; ?>
    </div>
	<div class="form-group">
      <label for="pwd"><p style="color:white;font-family:timenewroman;font-size:20px">Confirm Password:</p></label>
      <input class="form-control" type='password' name="pass" required><?php echo $conpasserr; ?>
    </div>
    <input type='submit' style='width:120px' class="btn btn-primary" value='Reset' name="submit"> 
   
   
  </form>
</div>
</body>
</html>

