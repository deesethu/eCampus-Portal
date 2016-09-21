<?php
	include "mongoConfigBvrit.php";
	$mdb = mongoConnect();
	$Bcode = $_POST["bcode"];
	echo $Bcode;
?>