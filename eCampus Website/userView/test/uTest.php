<?php
include "mongoConfigBvrit.php";

$mdb = mongoConnect();
$test=$mdb->selectCollection('testinfo');
$secInfo=$mdb->selectCollection('sections');
$section=sec1;
$category=cat1;
$secContent=$secInfo->find(array("secid"=>$section));
foreach($secContent as $obj){
	echo $obj["secName"];
	echo "<br>";
	echo $obj["rules"];
	echo "<br>";
}
$nosec=2;
$nocat=2;
$noques["1"]["1"]=2;
$noques["1"]["2"]=3;
$noques["2"]["1"]=3;
$noques["2"]["2"]=3;
$k=1;
for($i=1;$i<=$nosec;$i++){
	$info[$k]=$nocat;
	$k++;
	for($j=1;$j<=$nocat;$j++){
		$info[$k]=$noques[$i][$j];
		$k++;
	}
}
$count=count($info);
	//$test_insert=$test->insert(array("testid"=>"1","nosec"=>$nosec,"nocat"=>$nocat,"noques"=>$info));

$cursor=$test->find(array(),array("noques"=>1));
/*foreach($cursor as $obj){
	print_r($obj["noques"]);
}*/
function retriv_ques($secid,$catid,$q){
$mdb = mongoConnect();
$questions=$mdb->selectCollection('questions');
$ques=$questions->find(array("section"=>$secid,"category"=>$catid));
$quesCount=0;
echo $catid;
echo ":";

foreach($ques as $obj){
	if($quesCount<$q){
		echo $obj["question"];
		echo '<br>';
		for($i=1;$i<=4;$i++){
			echo '<input type="radio">'.$obj["options"][$i].'';
			echo "<br>";
		}
		echo "<br>";
		$quesCount++;
	}
	}
}
		
$cat=0;
for($i=0;$i<$count;$i++){
		if($cat!=0){
		while($cat){
		$q=$info[$i];
		$i++;
		retriv_ques($section,$category,$q);
		$cat--;
		}
		$i--;
	}
	else
	{
		$cat=$info[$i];
	}
}
?>