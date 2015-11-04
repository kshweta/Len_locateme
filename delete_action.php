
<?php


include_once('dbconfig.php');

if(isset($_POST['delete']))

{

	$foo=$_POST['foo'];
	
	$q1="DELETE FROM `venuedata` where `mid` = '$foo' ";
	$r1=mysql_query($q1);
	$q2="DELETE FROM `apdata` where `mid` = '$foo' ";
	$r2=mysql_query($q2);

	if($r1 && $r2)
	{
		echo'<script>window.location="http://localhost/locateme/addvenue.php";</script>';
	}

}




?>