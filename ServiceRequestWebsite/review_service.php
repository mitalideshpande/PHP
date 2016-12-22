<?php 
session_start(); 
include('usersample.php'); 
?>
<html>
<meta http-equiv="content-type“
content="text/html; charset=iso-8859-1" />
<body>
<br>
<center> <u> Previous Service Requests </u> 
<br>
<br>
<form action="userhome.php" method="post">
<table cellpadding="10">
<tr><th>Request Given for</th>
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
  $data="select request_type,issue_details from service_det where rid=$sid" ;
  $result = @mysql_query($data, $conn);
  if (mysql_num_rows ($result) == 0) 	
		{
			 $value = "No Requests registered";
			 
			 	 
		}
	else
	{ 		  
			while(($row = mysql_fetch_assoc($result)) !== FALSE)
			{
				
				echo "<tr><td>";
				echo $row['request_type'] ;
				echo "</td>";
				echo "<td>";
				echo $row['issue_details'];
				echo "</td>";
				echo "</tr>";
			}
			
	
}
?>
</table>
</form>
</body>
</html>