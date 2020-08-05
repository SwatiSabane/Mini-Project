
<?php
$nameerr= $firstnameErr = $lastnameerr = $middlenameerr = $photoerr = $emailErr = $addresserr = $additionalremarkerr = $phonenumbererr = $usererr= $passwderr = $confirmpwderr = $genderErr =  "";
$firstname = $middlename = $photo = $lastname = $address = $email = $gender = $additionalremark = $phonnumber = $username = $password = $confirmpassword = "";
$flag=true;
$flag1=false;


if(isset($_POST['submit']))
{
		$firstname = $_POST["firstname"];
		$middlename = $_POST["middlename"];
		$lastname = $_POST["lastname"];
		$email =$_POST["email"];
		$gender =$_POST["gendr"];
		$phonnumber=$_POST["mobileno"];
		$address=$_POST["address"];
		$username=$_POST["username"];
		$password=$_POST["pass"];
		$additionalremark=$_POST["additionalremarks"];
		$filename=addslashes($_FILES["photo"]["name"]);
		$tempfilename=addslashes(file_get_contents($_FILES["photo"]["tmp_name"]));
		$filetype=addslashes($_FILES["photo"]["type"]);
		$array=array('jpg','jpeg');
		$ext=pathinfo($filename,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $_FILES["photo"]["name"]); 
      				
		if(!empty($filename))
		{
			if (in_array($ext,$array))
			{
			}
			else{
				echo "unsupproted format";
			}
		}
	
	if($flag1==false)
	{		
						  if(empty($firstname))
						  {
							$nameerr = "Name is required";
							$flag=false;
						  }
						  else if(!preg_match("/^[A-Za-z]+$/",$firstname))
							{
								$firstnameErr= "Name must contain characters";
								$flag=false;
							}
						  
						  
						   if (empty($middlename)) 
						   {
							$nameerr = "Name is required";
							$flag=false;

						   } 
						  else if (!preg_match("/^[a-zA-Z ]*$/",$middlename))
							{
							  $middlenameerr = "Only letters and white space allowed";
							  $flag=false;
							}
						  
						  
						  if (empty($lastname))
						  {
							$nameerr = "Name is required";
							$flag=false;
						  } 
						  else if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
							  $lastnameerr = "Only letters and white space allowed";
							  $flag=false;
						  }
						  
						  if (empty($email)) {
							$emailErr = "Email is required";
							$flag=false;
						  } 
							
							
							if (empty($address)) 
							{
							$addresserr = "address is required";
							$flag=false;
							}  
							

							if (empty($additionalremark))
							{
							$additionalremarkerr = "Remark is required";
							$flag=false;
						   } 
						  
						  if (empty($gender)) 
						  {
							$genderErr = "Gender is required";
							$flag=false;
						  } 
						  
						   if (empty($phonnumber)) {
							$phonenumbererr = "phone number is required";
							$flag=false;
						  } 
						  
						  if (empty($username)) {
							$usererr = "User name is required";
							$flag=false;
						  } 
						  
						  if (empty($password)) {
							$passwderr = "password is required";
							$flag=false;
						  } 
						  
						  if (empty($confirmpassword)) {
							$confirmpwderr = "password is required";
							$flag=false;
							$flag1=true;
							
						if($password!=$confirmpassword)
						{
								$confirmpwderr = "password match is required";
							$flag=false;
							
						}
				  }
  } 
  if($flag1)
		{
			$conn = mysqli_connect("localhost","root","","mydb");
			if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			}		
				$sql_u = "SELECT * FROM mytable WHERE username='$username'";
  	$sql_e = "SELECT * FROM mytable WHERE email='$email'";
  	$res_u = mysqli_query($conn, $sql_u);
  	$res_e = mysqli_query($conn, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  echo"Sorry... username already taken"; 	
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry... email already taken"; 	
  	}else{
			$sql = "INSERT INTO MyTable (username,firstname ,lastname,middlename ,gender,email,mobileno ,address,remark ,password ,DateTime,photo)
					VALUES ('$username','$firstname','$lastname','$middlename','$gender','$email',$phonnumber,'$address','$additionalremark','$password',CURTIME(),'$tempfilename')";
	
	if (mysqli_query($conn, $sql)) {
			echo "Record inserted successfully.";
			} 
	

		mysqli_close($conn);
		}
}}
?>	


<html>
<head>
<title>Registration Form</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">  
<style>
body{
	background-image: url('logi.jpg');
background-size:cover;	
background-repeat:no repeat;
}
@media (min-width: 1000px) {
    .container{
        max-width: 500px;
    }
}

#a{
background: rgba(0,0, 100, 0.1);
font-size:15px;
height:800px;
width:600px;
align:center;
margin-left:400px;
font-family:verdana;
margin-top:50px;
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
  <script>
$(document).ready(function(){
  $("#btn1").click(function(){
    alert($("#test").text());
  });
  $("#btn2").click(function(){
    alert("HTML: " + $("#test").html());
  });
});
</script>
</head>

<body>
<div class="container" style="width:50%" >
	<form action="register_php.php" method="post" enctype="multipart/form-data">
			
		
		
			<h3 style='color:georgian;font-family:timesnewroman;margin-top:20px;color:white'>Registration Form</h3><br>
			     <div class="form-group">
				<label for="fname" style='color:white;margin-left:10px'>First Name :</label>
				 <input type='text'class="form-control" name="firstname" placeholder='First Name'  style='margin-left:10px' ><?php echo $nameerr; ?><?php echo $firstnameErr; ?>
				 </div>
			     <div class="form-group">
				<label for="mname" style='color:white;margin-left:10px'>Middle Name : </label>
				<input type='text'class="form-control" name="middlename" placeholder='Middle Name'     style='margin-left:10px' ><?php echo $nameerr;?>
			     </div>
				 <div class="form-group">
				<label for="lname" style='color:white;margin-left:10px'>Last Name : </label>
				<input type='text' class="form-control" name="lastname" placeholder='Last Name'  style='margin-left:10px' ><?php echo $nameerr;?>
			     </div>
				 <div class="form-group">
				<label for="gender" style='color:white;margin-left:10px'>Gender :</label>
				<div class="radio">
                <label style='color:white;margin-left:10px'><input type="radio" name="gendr" checked>Male</label>
                </div>
                <div class="radio">
                <label style='color:white;margin-left:10px'><input type="radio" name="gendr" >Female</label>
                </div>
                <div class="radio disabled">
                <label style='color:white;margin-left:10px'><input type="radio" name="gendr" disabled>Other</label>
                </div>
			    </div>
				<div class="form-group">
				<label for="email" style='color:white;margin-left:10px'>E-Mail ID :</label>
				<input type='email' class="form-control" name="email" style='margin-left:10px' placeholder='E-Mail' > <?php echo $emailErr;?>
			    </div>
				<div class="form-group">
				<label for="mobile" style='color:white;margin-left:10px'>Mobile No. :</label>
				<input type='number' class="form-control" name="mobileno" style='margin-left:10px' pattern="[0-9].{10,}" title="enter valid mobile no." ><?php echo $phonenumbererr;?>
			     </div>
                 <div class="form-group">				 
				<label for="address" style='color:white;margin-left:10px'>Address : </label>
				<textarea  name="address" class="form-control" rows='4'  cols='30' style='margin-left:10px' > <?php echo $addresserr;?></textarea>	
			     </div>
				 <div class="form-group">
				<label for="addrem" style='color:white;margin-left:10px'>Additional Remark :</label>
				<textarea name="additionalremarks"  class="form-control" rows='4' cols='30' style='margin-left:10px' > </textarea>
			    </div>
				<div class="form-group">				
				<label for="photo" style='color:white;margin-left:10px'> Photo :</label>
				<input type='file' class="form-control" name="photo" style='margin-left:10px' ><?php echo $photoerr;?>
				</div>
				<div class="form-group">
				<label for="uname" style='color:white;margin-left:10px'>Username :</label>
				<input style='margin-left:10px' class="form-control" type='text' name="username"  placeholder='Username' ><?php echo $usererr;?>
				</div>
				<div class="form-group">
				<label for="pass" style='color:white;margin-left:10px'>Password :</label>
				<input style='margin-left:10px' class="form-control" style='margin-left:10px'  type='password' title="must contain atleast one number ,one uppercase and lowercase letter and atleast 8 or more characters" placeholder='Password' ><?php echo $passwderr;?>
				</div>
				<div class="form-group">
				<label for="conpass" style='color:white;margin-left:10px'> Confirm Password :</label>
				<input style='margin-left:10px' class="form-control" name="pass" type='password' placeholder='Password'  title="must contain atleast one number ,one uppercase and lowercase letter and atleast 8 or more characters" >
				</div>
				<p id="test">Registered Successfully.</p>
				<input name="submit" type='submit' class="btn btn-light" id="btn1" value='Submit' style="margin-left:50px">
				<input type='reset' value="Clear" class="btn btn-light" style="margin-left:50px"></td>
				<a href="attendancePageadmin.php"><input type='button' align='center' class="btn btn-light" value='Back' style="margin-left:50px"></a>
		
		
		
		
	</form>
	</div>
</body>

</html>
