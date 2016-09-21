<?php

include "mongoConfigBvrit.php";
$mdb=mongoConnect();
$branches=$mdb->selectCollection("branches");


ini_set('display_errors', 1);
error_reporting(E_ALL);
//echo $_POST["values"];
$count=count($_POST["values"]);
$i=0;
while($i<$count){
	
	$bCode = $_POST["values"][$i];
	$i++;
	$bName = $_POST["values"][$i];
	$i++;
	$bAbbr = $_POST["values"][$i];
	$i++;
	$bYears = $_POST["values"][$i];
	$i++;
	$bInsert = $branches->insert(array("branchCode"=>$bCode,"branchName"=>$bName,"branchAbbv"=>$bAbbr,"nOfYears"=>$bYears));
	
}
if($bInsert==1){
		echo "Successfully stored in the database";
	}

?>