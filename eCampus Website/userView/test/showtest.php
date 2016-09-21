<?php
include "mongoConfigBvrit.php";

$mdb = mongoConnect();

$test=$mdb->selectCollection('testinfo');
	
$cursor=$test->find();
foreach($cursor as $obj){
	print_r($obj["noques"]);
}
	
//print_r($attr);
?>