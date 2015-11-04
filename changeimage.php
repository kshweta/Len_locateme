
<?php


include_once('dbconfig.php');

if(isset($_FILES['changeimage']) && isset($_POST['change']))

{

	$foo=$_POST['foo'];
	$image=md5(md5($foo."map")+"bshikhar13");
	$img_url = "maps/";
	$ext = pathinfo($_FILES['changeimage']['name'], PATHINFO_EXTENSION);
	$img_url= $img_url.$image.".".$ext;

	$q="UPDATE `venuedata` SET `img_url` = '$img_url' where `mid` = '$foo' ";
	$r=mysql_query($q);
	if(move_uploaded_file($_FILES['changeimage']['tmp_name'], $img_url) && $r)
	{
		echo'<script>window.location="http://localhost/locateme/addvenue.php";</script>';
	}

}




?>