<?php session_start();
include "mongoConfigBvrit.php";
$mdb=mongoConnect();

if(!isset($_SESSION["uname"])){
	$user=$mdb->selectCollection("userDetails");
	$test = $user->find(array("username"=>$_POST["uname"],"password"=>$_POST["password"]));
	if($test->count()==1)
		$_SESSION["uname"]=$_POST["uname"];
	else
		header('Location: /ecampus/index.php');
}
   
	$testDb = $mdb->selectCollection("testDb");
   $Test = json_decode($_POST["Test"]);
  
	$cursor = $testDb->findOne(array("insertCount"=>"true"));
	
	$id="test";
	if(count($cursor) == 0)
	{
		$rowId = array("totalInserts"=>1,"insertCount"=>"true");
		$testDb->insert($rowId);
		$id = $id . 1;
		$testDb->insert(array("testid"=>$id,"patternid"=>$_POST["Pattern"],"questions"=>$Test,"uname"=>$_SESSION["uname"]));
		echo $id;
	}
	else
	{
		$currentCount=$cursor["totalInserts"];
		$currentCount++;
		$id = $id . $currentCount;
		$testDb->insert(array("testid"=>$id,"patternid"=>$_POST["Pattern"],"questions"=>$Test));
		$testDb->update(array("insertCount" => "true"), array('$set' => array("totalInserts" => $currentCount)));
		echo $id;
	}		
?>
