<?php
include "mongoConfigBvrit.php";
$mdb=mongoConnect();
$admin=$mdb->selectCollection("adminDetails");

	$obj["username"] = $_POST["username"];
	$obj["email"] = $_POST["email"];
	$obj["password"] = $_POST["password"];
	$obj["mobile"] = $_POST["mobile"];
	$obj["universityName"] = $_POST["universityName"];
	$obj["collegeName"] = $_POST["collegeName"];
	$adminInsert=$admin->insert($obj);
	if($adminInsert==1)
	{
		header('Location: http://localhost/ecampus/rootview/rootLogin.php');
	}
?>