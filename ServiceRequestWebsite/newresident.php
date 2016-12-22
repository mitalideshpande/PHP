<?php include('mainsample.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<html>
<meta http-equiv="content-type“
content="text/html; charset=iso-8859-1" />
<head></head>
<body>
<br>
<img src="https://uisacad5.uis.edu/~mdesh2/FinalProject/registration.png" alt="service" width="400" height="300" align="left" />
<center> <u> Enter Your Details </u> 
<br>
<br>
<form action="newresident.php" method="post">
<table cellpadding="10">
<tr>
<td>First Name</td>
<td><input type="text" name="fname" maxlength="20"></td>
</tr>
<tr>
<td>Last Name</td>
<td><input type="text" name="lname" maxlength="20"></td>
</tr>
<tr>
<td>Email Address</td>
<td><input type="text" name="emailid"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="passwd" maxlength="8"></td>
</tr>
<tr>
<td>Choose your Apartment</td>
<td><select name="placeno">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
</select>
<select name="place">
  <option value="Candlelight">Candlelight</option>
  <option value="Candlewood">Candlewood</option>
  <option value="Candletree">Candletree</option>
</select>
<select name="aptno">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
 </select> 
</td>
</tr>
<tr>
<td colspan=2 align="center"><input type="submit" value="Register" name="btnsub" /></td>
</tr>
<?php
if (isset($_POST['btnsub']))
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$password = $_POST['passwd'];
	$email = $_POST['emailid'];
	$place1 = $_POST['placeno'];
	$place2 = $_POST['place'];
	$place3 = $_POST['aptno'];
	$apartment = $place1.$place2.$place3;
	$status = "N";
	$flag = 1;
	$conn = mysql_connect('127.0.0.1', 'mdesh2', 'Mit492@md');
	if (!$conn)
  {
  die('Connection is not established : ' . mysql_error());
  }

   mysql_select_db('mdesh2', $conn);
	
	
	if ((empty($_POST['fname']))|| (empty($_POST['lname'])) || (empty($_POST['passwd'])) || (empty ($_POST['emailid'])))
	{
		$value = "Please fill required fields.";
		$flag = 0;
		
	}	
	else
	{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $value = "Invalid email format"; 
	  $flag=0;
	}	
	}
	
	if($flag == 1)
	{
		$data = "insert into resident_det(fname,lname,emailid,password,apt,status) values ('$fname','$lname','$email','$password','$apartment','$status')";
		$reg = mysql_query($data,$conn);
		if($reg)
		{
			$value = "You are registered sucessfully!";
		}
		else
		{
			$value = "Unable to enter details";
		}
		
	}
		

}
?>
<tr>
<td colspan=2><?php echo $value ?></td>
</tr>
</table>
</form>
</center>
</body>
</html>