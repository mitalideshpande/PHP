<?php session_start(); 				// for using session we need to start sessions
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<html>
<meta http-equiv="content-type“
content="text/html; charset=iso-8859-1" />
<head><link href="style.css" rel="stylesheet" type="text/css" media="all" /></head>
<body>
<div id="table1">
<table width="100%" cellpadding="10">
<tr>
<td align="center" width="80%"><font size="10" color="red">Request a Service</td>
<td>
<table cellpadding="2" align="left">
<tr>
<form action="Homepage.php" method="post">
<?php session_start() ?>                              
<td><font color="red">Username</td>
<td><input type="text" name="uname"></input></td>
</tr>
<tr>
<td><font color="red">Password</td>
<td><input type="password" name="passwd"></td>
</tr>
<tr>
<td colspan=2 align="center"><input type="submit" value="Login" name="btnsub" /></td>
</tr>
<?php

if (isset($_POST['btnsub']))
{
	
	$conn = mysql_connect('127.0.0.1', 'mdesh2', 'Mit492@md');			// we establish connection with the database
	if (!$conn)
  {
  die('Connection is not established : ' . mysql_error());
  }

   mysql_select_db('mdesh2', $conn);
   
   $uname=$_POST['uname'];
   $passwd=$_POST['passwd'];
   $value = "";
  // echo "Username:$uname and $passwd";
   $data="select rid,emailid,password,status from resident_det where emailid='$uname' and password='$passwd'" ;
   $result = @mysql_query($data, $conn);
   if (mysql_num_rows ($result) == 0) 					//if the select query returns no values print invalid login. If no details present invalid login
		{
			 $value = "Invalid Login";
			 
			 	 
		}			
		else
		{
           while(($row = mysql_fetch_assoc($result)) !== FALSE)
          {	   
		
		          if ((($row['emailid']) == $uname) && (($row['password']) == $passwd) && (($row['status'] == 'Y')))   //login only with valid username password and status as Y 																						// we compare whether the entered username and password match with database entries
				  {
					  $_SESSION['id']=$row['rid'];
					  if (($row['rid']) == 0)
					  {	  
					  header('location:https://uisacad5.uis.edu/~mdesh2/FinalProject/residentdet.php'); //if resident id is 0 redirect to admin homepage
					  }
					  else
					  {
					  header('location:https://uisacad5.uis.edu/~mdesh2/FinalProject/userhome.php'); // if resident id is not 0 redirect to user homepage
					  }	  
					  
					   
				  }
				  else
				  {
					  if (($row['status'] == 'N'))				//if the admin has not verified the account and if the status is N do not login
					  
					  
					  
					  $_SESSION['v'] = "Not a registered User";
					
						$value = $_SESSION['v'];
						
				  }	  
				   
				  
					 
				  	
		
          }
	//header('location:https://uisacad5.uis.edu/~mdesh2/FinalProject/userhome.php');					
      //exit;
}


}

?>
<tr>
<td colspan=2><font color="blue"><?php echo $value ?></td>
</tr>
</form>
</table></td>
</table>
</div>
<div id="icon">
<table width=100% cellpadding="3">
<tr>
<td align="center" width="33%" id="icon"><a href="Homepage.php">Home</a></td>
<td align="center" width="34%" id="icon"><a href="newresident.php">New Resident Registration</a></td>
<td align="center" width="33%" id="icon"><a href="contact.php">Contact Us</a> </td>
</tr>
</table>
</div>
<img src="https://uisacad5.uis.edu/~mdesh2/servicereq.png" alt="service" width="700" height="400" align="left" /><br><br>
We at <b>Request a Service</b> provide service to apartments in our community.<p>If you have any issues at your home. Feel free to put a service request to us <br>and we will try to solve it as early as possible.</p>
<p>Also you can call us to place a request.</p>
<div id="footer">
<font color="red">Project By Mitali Deshpande(mdesh2) <br> CSC 368 Systems Programming Languages </font>
</div>
</body>
</html>