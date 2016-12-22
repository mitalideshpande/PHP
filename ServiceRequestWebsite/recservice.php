<?php include('adminsample.php'); ?>
<html>
<meta http-equiv="content-type“
content="text/html; charset=iso-8859-1" />
<body>
<br>
<center> <u> All received Service Requests </u> 
<br>
<br>
<form action="recservice.php" method="post">
<table cellpadding="10">
<tr><th>First Name</th>
<th>Last Name</th>
<th>Email Address</th>
<th>Apartment</th>
<th>Request for</th>
<th>Details</th>
</tr>
<?php
$value="";
$sid = $_SESSION['id'];
$conn = mysql_connect('127.0.0.1', 'mdesh2', 'Mit492@md');
	if (!$conn)
  {
  die('Connection is not established : ' . mysql_error());
  }
  mysql_select_db('mdesh2', $conn);
  $data="select fname,lname,emailid,apt,request_type,issue_details from resident_det,service_det where resident_det.rid=service_det.rid;" ;
  $result = @mysql_query($data, $conn);
  if (mysql_num_rows ($result) == 0) 	
		{
			 $value = "No Requests received";
			 
			 	 
		}
		else
	{ 		  
			while(($row = mysql_fetch_assoc($result)) !== FALSE)
			{
				
				echo "<tr><td>";
				echo $row['fname'] ;
				echo "</td>";
				echo "<td>";
				echo $row['lname'];
				echo "</td>";
				echo "<td>";
				echo $row['emailid'] ;
				echo "</td>";
				echo "<td>";
				echo $row['apt'] ;
				echo "</td>";
				echo "<td>";
				echo $row['request_type'] ;
				echo "</td>";
				echo "<td>";
				echo $row['issue_details'] ;
				echo "</td>";
				echo "</tr>";
			}
			
	
}
?>
</table>
</form>
</center>
</body>
</html>