


<?php 
include_once('dbconfig.php');

if(isset($_FILES['mapimage']) && isset($_POST['submit']))

{
	
	$mname=$_POST['mname'];
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

	$a="venue_".$mname."_";
	$i=rand(1,10);
	$temp=$a.$i;
	$mid = md5(md5($temp)."bshikhar13");
	$image=md5(md5($mid."map")+"bshikhar13");
	$img_url = "maps/";
	$ext = pathinfo($_FILES['mapimage']['name'], PATHINFO_EXTENSION);
	$img_url= $img_url.$image.".".$ext;
	move_uploaded_file($_FILES['mapimage']['tmp_name'], $img_url);
	
	$querry1="INSERT INTO `venuedata`(`mid`, `mname`, `mdesc`, `img_url`, `length`, `breadth`, `ap1`, `ap2`, `ap3`, `ap4`) VALUES ('$mid','$mname','$mdesc','$img_url','$length','$breadth','$ap1_ssid','$ap2_ssid','$ap3_ssid','$ap4_ssid')";
	$result1=mysql_query($querry1);
	$querry2="INSERT INTO `apdata`(`mid`,`ap_ssid`, `A`, `n`, `x`, `y`) VALUES ('$mid','$ap1_ssid','$ap1_a','$ap1_n','$ap1_x','$ap1_y')";
	$result2=mysql_query($querry2);
	$querry3="INSERT INTO `apdata`(`mid`,`ap_ssid`, `A`, `n`, `x`, `y`) VALUES ('$mid','$ap2_ssid','$ap2_a','$ap2_n','$ap2_x','$ap2_y')";
	$result3=mysql_query($querry3);
	$querry4="INSERT INTO `apdata`(`mid`,`ap_ssid`, `A`, `n`, `x`, `y`) VALUES ('$mid','$ap3_ssid','$ap3_a','$ap3_n','$ap3_x','$ap3_y')";
	$result4=mysql_query($querry4);
	$querry5="INSERT INTO `apdata`(`mid`,`ap_ssid`, `A`, `n`, `x`, `y`) VALUES ('$mid','$ap4_ssid','$ap4_a','$ap4_n','$ap4_x','$ap4_y')";
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




