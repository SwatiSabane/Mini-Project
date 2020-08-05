
<?php

session_start();


?>


<html>
<style>

body{
	background-image: url('back2.png');
background-size:cover;	
background-repeat:no repeat;
}
#a{
	background-image: url('logj.png');
	background-size:cover;	
    background-repeat:no repeat;
	width:60%;
    margin-top:20px;
	padding-top:20px;
	border:5px solid black;
}
#b{
	background-image: url('logg.jpg');
	width:60%;
	height:10%;
	color:white;
	margin-top:10px;
	font-family:Times New Roman;
	font-size:30px;
}

</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
<center><div id="b"><h1> <marquee behavior="scroll" direction="left">Check Your Attendance</marquee></h1></div></center>
<center><div id="a">
<div>
	<form method="POST">
		<label>From: </label><input type="date" style="margin-top:20px;height:30px;width:120px" name="from"> &nbsp &nbsp
		<label>To: </label><input type="date" style="margin-top:20px;height:30px;width:120px" name="to">
		<input type="submit" value="Get Data" style="margin-left:20px;height:30px;width:80px" name="submit">
	</form>
</div>
<h2>Data Between Selected Dates</h2>

<div>
	<table style="margin-left:px" border="1" cellspacing="8px" color="white">
		<thead>
			<th>LoginId</th>
			<th>Date</th>
			<th>Attendance Status</th>
			
		</thead>
		<tbody>
		<?php
			if (isset($_POST['submit'])){
				include('conn.php');
				$from=date('Y-m-d',strtotime($_POST['from']));
				$to=date('Y-m-d',strtotime($_POST['to']));
				
				
				//MySQLi Object-oriented
				$oquery=$conn->query("select * from empatt where loginid='{$_SESSION['user_name']}' and  ddd between '$from' and '$to'");
				while($orow = $oquery->fetch_array()){
					?>
					<tr>
						<td><?php echo $orow['loginid']?></td>
						<td><?php echo $orow['ddd']?></td>
						<td><?php echo $orow['atts']?></td>
					</tr>
					<?php 
				}
			}
		?>
		</tbody>
	</table>
</div>
<script>
$(document).ready(function(){
  $("#logout").click(function(){
    alert("Are you sure? " );
  });
  
});
</script>
<a href="third.php"><input type="button" style="margin-top:20px;height:30px;width:80px" value="Log Out" id="logout"></a>
<div></center>
</body>
</html>