<?php

include("mongoConfigBvrit.php");
$mdb=mongoConnect();
$facultyDetails = $mdb->selectCollection("facultyDetails");
$facExist=$facultyDetails->find(array("fname"=>$_POST["fname"]));
$facIncharge=$facultyDetails->find(array("branchCode"=>$_POST["branch"],"year"=>$_POST["Year"],"sid"=>$_POST["subject"]));
if($facExist->count() == 0 and $facIncharge->count() == 0){

	$obj["fname"] = $_POST["fname"];
	$obj["email"] = $_POST["email"];
	$obj["password"] = $_POST["password"];
	$obj["gender"] = $_POST["gender"];
	$obj["dob"] = $_POST["dob"];
	$obj["mobile"] = $_POST["mobile"];
	$obj["college"] = $_POST["college"];
	
	/*foreach($_POST["branch_list"] as $blist){
		$bArray[]=$blist;
	}
	$obj["branch"]=$bArray;
	//print_r($obj);
	*/
	$obj["branchCode"] = $_POST["branch"];
	$obj["year"] = $_POST["Year"];
	$obj["sid"] = $_POST["subject"];
	//echo $obj["subject"];
	/*foreach($_POST["year_list"] as $ylist){
		$yArray[]=$ylist;
	}
	$obj["year"] = $yArray;
	
	foreach($_POST["subject_list"] as $slist){
		$sArray[]=$slist;
	}
	$obj["subject"] = $sArray;
	//print_r($obj);*/
	$faculty=$facultyDetails->insert($obj);
	//echo $faculty;
	if($faculty==1)
	{
		header('Location: http://localhost/ecampus/facultyView/facultyLogin.php');
	}
}
else{
		header('Location: http://localhost/ecampus/facultyView/facultyRegistration.php');

}
?>
