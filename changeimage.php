
<?php


include_once('dbconfig.php');

if(isset($_FILES['changeimage']) && isset($_POST['change']))

{

	$foo=$_POST['foo'];
	$pixelx=$_POST['pixelx'];
	$pixely=$_POST['pixely'];
	$image=md5(md5($foo."map")+"bshikhar13");
	$img_url = "maps/";
	$ext = pathinfo($_FILES['changeimage']['name'], PATHINFO_EXTENSION);
	$image=$image.".".$ext;
	$img_url= $img_url.$image;

	$q="UPDATE `venuedata` SET `img_url` = '$image' , `pixelX` = '$pixelx' , `pixelY`= '$pixely' where `id` = '$foo' ";
	$r=mysql_query($q);
	if(move_uploaded_file($_FILES['changeimage']['tmp_name'], $img_url) && $r)
	{
		echo'<script>window.location="http://localhost/locateme/addvenue.php";</script>';
	}

}




?>