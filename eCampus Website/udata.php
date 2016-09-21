<?php
include ("mongoConfigBvrit.php");
$mdb = mongoConnect();
$userDetails = $mdb->selectCollection("userDetails");
$uFind = $userDetails->find(array("username"=>$_POST["username"]));

if($uFind->count() == 0){
	$obj["username"] = $_POST["username"];
	$obj["email"] = $_POST["email"];
	$obj["password"] = $_POST["password"];
	$obj["password_confirm"] = $_POST["password_confirm"];
	$obj["branchCode"] = $_POST["branch"];
	$obj["year"] = $_POST["Year"];
	$obj["mobile"] = $_POST["mobile"];
	$obj["dob"] = $_POST["dob"];
	$obj["gender"] = $_POST["gender"];
	$obj["college"] = $_POST["college"];
	//echo $_POST["college"];
	$user=$userDetails->insert($obj);
	if($user==1)
	{
		header('Location: http://localhost/ecampus/index.php');
	}
}
	else{
		header('Location: http://localhost/ecampus/register.php');
	}
	//$userDetails->update(array('name' => 'deepak'), array('$set' => array('name' => 'sethunath')));
?>	