<?php session_start(); 
include('usersample.php'); ?>
<html>
<head></head>
<body>
<br>
<center> <u> Submit Service Request </u> 
<br>
<br>
<form action="userhome.php" method="post">
<b>What type of problem your facing? </b>
<table cellpadding="10">
<tr>
<td>Appliance</td> 
<td> 
  <input type="radio" name="problem" value="Microwave">Microwave
  <input type="radio" name="problem" value="Dishwasher">Dishwasher
  <input type="radio" name="problem" value="Refrigerator">Refrigerator
</td>
</tr>
<tr>
<td>Doors/Locks</td>
<td>
  <input type="radio" name="problem" value="Room_Door">Room Door
  <input type="radio" name="problem" value="Exterior_Door">Exterior Door
</td>
</tr>
<tr>
<td>Electrical</td>
<td>
  <input type="radio" name="problem" value="Outlets">Outlets
  <input type="radio" name="problem" value="Interior_lights">Interior Lights
  <input type="radio" name="problem" value="Fans">Fans
</td>
</tr>
<tr>
<td>Describe your Problem</td>
<td><textarea name="area" rows="5" cols="20"></textarea></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Submit" name="btnsub" /></td>
</tr>
</table>
<?php
if (isset($_POST['btnsub']))
{
	$reqtype=$_POST['problem'];
	$reqdetails=$_POST['area'];
	$reqstatus="Received";
	$fid=$_SESSION['id'];
	$conn = mysql_connect('127.0.0.1', 'mdesh2', 'Mit492@md');
	if (!$conn)
  {
  die('Connection is not established : ' . mysql_error());
  }

   mysql_select_db('mdesh2', $conn);
   $data = "insert into service_det(request_type,issue_details,rid,req_status) values ('$reqtype','$reqdetails','$fid','$reqstatus')";
		$reg = mysql_query($data,$conn);
		if($reg)
		{
			$value = "Service request sent sucessfully!";
			echo "<b><center>$value</center></b>";
		}
		else
		{
			$value = "Unable to place request";
			echo "<b><center>$value</center></b>";
		}
}	?>
</form>
</center>
</body>
</html>
 