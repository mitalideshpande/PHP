<?php include('adminsample.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<html>
<meta http-equiv="content-type“
content="text/html; charset=iso-8859-1" />
<head><link href="style.css" rel="stylesheet" type="text/css" media="all" /></head>
<body>
<center><u> Resident Details </u><center>
<form action="residentdet.php" method="post">
<table cellpadding=10>
<tr><th>Resident ID </th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email ID</th>
<th>Apartment</th>
<th>Status</th>
<th> Edit Status </th>
</tr>
				           
<?php
$value="";
$conn = mysql_connect('127.0.0.1', 'mdesh2', 'Mit492@md');
	if (!$conn)
  {
  die('Connection is not established : ' . mysql_error());
  }
  mysql_select_db('mdesh2', $conn);												//check database connectivity
  $data="select rid,fname,lname,emailid,apt,status from resident_det" ;
  $result = @mysql_query($data, $conn);											// we update the database here by changing the status value of each resident_det 	
  if (mysql_num_rows ($result) == 0) 	
		{
			 $value = "No Residents registered";
																		//we provide an hyperlink 'edit status'. By clicking that link we can change the status of user. 
			 	 
		}
	else
	{ 		  
			while(($row = mysql_fetch_assoc($result)) !== FALSE)
			{
																	// here are the registered user details
				echo "<tr><td>";
				echo $row['rid'] ;
				echo "</td>";
				echo "<td>";
				echo $row['fname'];
				echo "</td>";
				echo "<td>";
				echo $row['lname'];
				echo "</td>";
				echo "<td>";
				echo $row['emailid'];
				echo "</td>";
				echo "<td>";
				echo $row['apt'];
				echo "</td>";
				echo "<td>";
				echo $row['status'];
				echo "</td>";
				echo "<td>";
				echo '<a href="editstatus.php?id='.$row['rid'].'">Edit Status'; // link to edit status
				echo "</td>";
				echo "</tr>";
				
	        }
			
	   }		
?>
<tr><td colspan="2"><?php echo $value ?><td></tr>
</table>
</center>
</form>
</body>
</html>