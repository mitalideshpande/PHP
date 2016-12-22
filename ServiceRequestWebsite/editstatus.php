<?php session_start();         
ob_start();
include('adminsample.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<html>
<meta http-equiv="content-type“
content="text/html; charset=iso-8859-1" />
<body>
<br><br>
<center>
<b><u>You can choose the following options to edit resident status</u></b>
<br>
<br>
<form action="editstatus.php" method="post">
<input type="radio" name="status" value="Y">Add Resident </input> <br><br>
<input type="radio" name="status" value="N">Remove Resident </input><br><br>
<input type="hidden" name="name" value="<?php echo htmlspecialchars($_GET['id']);?>">
<input type="submit" value="Confirm" name="rbtn">
</center>
<?php
$rid = $_GET['id']; 									// we get the specific resident id to edit from the url using get method
														// for saving the value which we get from url, we have used input tag of type hidden which is not visible and which can store that value. We access this value using post method.

echo "<center>";
echo "<br>";
echo "<br>";
echo "You have chosen Resident ID: <b>$rid</b> <br>";
echo "<br>";


   $status = $_POST['status'];
  // echo "Show status ".$status;
  // echo "Show id ".$_SESSION['sid'];
   $val = "";
   if (isset($_POST['rbtn']))
{
	  
	$conn = mysql_connect('127.0.0.1', 'mdesh2', 'Mit492@md');
	if (!$conn)
  {
  die('Connection is not established : ' . mysql_error());
  }
  mysql_select_db('mdesh2', $conn);
  $tid = $_POST['name'];								// post method to access value from input tag hidden

   $data="update resident_det set status='$status' where rid=$tid" ;
  $result = @mysql_query($data, $conn);
   if (mysql_affected_rows())
   {
	  $val = "Status was edited sucessfully";				
		echo "<b> $val </b>";
		
   }	
	else
	{
		 $val = "Status was not edited";
	   echo "Error to edit".mysql_error();
		
	}	
} 
?>
</form>
</center>
</html>
