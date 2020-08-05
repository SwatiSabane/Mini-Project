<?php
		session_start();
		
		session_destroy();
		header('Location:./index.php');
		
	/*unset($_SESSION['uname']);
	if(!isset($_SESSION['uname']))
	{
		
	}*/
?>

