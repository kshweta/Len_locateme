


<?php 
include_once('dbconfig.php');

if(isset($_POST['update']))

{	
	$mid=$_POST['foo'];
	
	$mdesc=$_POST['mdesc'];
	$length=$_POST['length'];
	$breadth=$_POST['breadth'];

	$ap1_ssid=$_POST['ap1_ssid'];
	$ap2_ssid=$_POST['ap2_ssid'];
	$ap3_ssid=$_POST['ap3_ssid'];
	$ap4_ssid=$_POST['ap4_ssid'];
	

	$ap1_a=$_POST['ap1_a'];
	$ap2_a=$_POST['ap2_a'];
	$ap3_a=$_POST['ap3_a'];
	$ap4_a=$_POST['ap4_a'];

	$ap1_n=$_POST['ap1_n'];
	$ap2_n=$_POST['ap2_n'];
	$ap3_n=$_POST['ap3_n'];
	$ap4_n=$_POST['ap4_n'];

	$ap1_x=$_POST['ap1_x'];
	$ap2_x=$_POST['ap2_x'];
	$ap3_x=$_POST['ap3_x'];
	$ap4_x=$_POST['ap4_x'];

	$ap1_y=$_POST['ap1_y'];
	$ap2_y=$_POST['ap2_y'];
	$ap3_y=$_POST['ap3_y'];
	$ap4_y=$_POST['ap4_y'];
	
	
	
	$querry1="UPDATE `venuedata` SET `description`='$mdesc',`length`='$length',`breadth`='$breadth' WHERE `id` = '$mid'";
	$result1=mysql_query($querry1);

	$querry2="UPDATE `apdata` SET `A`='$ap1_a',`n`='$ap1_n',`x`='$ap1_x',`y`='$ap1_y' WHERE `ap_ssid` = '$ap1_ssid'";
	$result2=mysql_query($querry2);

	$querry3="UPDATE `apdata` SET `A`='$ap2_a',`n`='$ap2_n',`x`='$ap2_x',`y`='$ap2_y' WHERE `ap_ssid` = '$ap2_ssid'";
	$result3=mysql_query($querry3);

	$querry4="UPDATE `apdata` SET `A`='$ap3_a',`n`='$ap3_n',`x`='$ap3_x',`y`='$ap3_y' WHERE `ap_ssid` = '$ap3_ssid'";
	$result4=mysql_query($querry4);

	$querry5="UPDATE `apdata` SET `A`='$ap4_a',`n`='$ap4_n',`x`='$ap4_x',`y`='$ap4_y' WHERE `ap_ssid` = '$ap4_ssid'";
	$result5=mysql_query($querry5);
	


	if($result1==1 && $result2==1 && $result3==1 && $result4==1 && $result5==1)
	{
		echo'<script>window.location="http://localhost/locateme/addvenue.php";</script>';
	}
	else
	{
		echo "Some Error Enter Again";
	}

}

?>




