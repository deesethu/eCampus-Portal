<?php

include "mongoConfigBvrit.php";
$mdb=mongoConnect();
$subject=$mdb->selectCollection("subjects");
$branch=$mdb->selectCollection("branches");


ini_set('display_errors', 1);
error_reporting(E_ALL);
//echo $_POST["values"];
$filepath="materials/";
$count=count($_POST["values"]);
$i=0;
while($i<$count){
	
	$sName = $_POST["values"][$i];
	$i++;
	$sInfo = $_POST["values"][$i];
	$i++;
	$year = $_POST["values"][$i];
	$i++;
	$bCode = $_POST["values"][$i];
	$i++;
	$bFind=$branch->find(array("branchCode"=>$bCode));
	
	$cursor = $subject->find();
	$id="sub";
	
	foreach($bFind as $obj1){
		if($cursor->count() == 0)
	{
		$rowId = array("totalInserts"=>1,"insertCount"=>"true");
		$subject->insert($rowId);
		$id = $id . 1;
		$sInsert = $subject->insert(array("branchCode"=>$bCode,"branchName"=>$obj1["branchName"],"branchAbbv"=>$obj1["branchAbbv"],"year"=>$year,"sid"=>$id,"subjectInfo"=>$sInfo,"subjectName"=>$sName,"filePath"=>$filepath.$id));
	}
	else
	{
		$cursor = $subject->find(array("insertCount"=>"true"));
		$currentCount;
		foreach($cursor as $obj)
		{
			$currentCount=$obj["totalInserts"];
		}
		$currentCount++;
		$id = $id . $currentCount;
		$sInsert = $subject->insert(array("branchCode"=>$bCode,"branchName"=>$obj1["branchName"],"branchAbbv"=>$obj1["branchAbbv"],"year"=>$year,"sid"=>$id,"subjectInfo"=>$sInfo,"subjectName"=>$sName,"filePath"=>$filepath.$id));
		$subject->update(array("insertCount" => "true"), array('$set' => array("totalInserts" => $currentCount)));
	}
}
	//$sInsert = $subject->insert(array("branchCode"=>$bCode,"branchName"=>$bName,"branchAbbv"=>$bAbbr,"year"=>$year,"sid"=>$sCode,"subjectInfo"=>$sInfo,"subjectName"=>$sName,"filePath"=>$filepath.$sCode));
	

}
if($sInsert==1){
	echo "Successfully stored in the database";
}

?>