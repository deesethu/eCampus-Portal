<?php session_start();
	include ("mongoConfigBvrit.php");
    $mdb = mongoConnect();
	if(!isset($_SESSION["fname"] , $_SESSION["sid"])){
		header('Location: http://localhost/ecampus/facultyview/facultylogin.php');
	}
	$testPattern = $mdb->selectCollection("testPattern");
	$count = $_POST["SecCount"];
	$timer = $_POST["time"];
	$pattern;
	for($i=0;$i<$count;$i++)
	{
		$sub = $_POST["secIdInput".$i];
		$qCount = $_POST["QuestionCount".$i];
		$marks = $_POST["marks".$i];
		$patternName = $_POST["patternName"];
		$pattern[] = array($sub,$qCount,$marks);
	}
	$cursor = $testPattern->find();
	$id="pattern";
	if($cursor->count() == 0)
	{
		$rowId = array("totalInserts"=>1,"insertCount"=>"true");
		$testPattern->insert($rowId);
		$id = $id . 1;
		$tPattern=$testPattern->insert(array("fid"=>$_SESSION["fname"],"sid"=>$_SESSION["sid"],"patternid"=>$id,"patternName"=>$patternName,"testTime"=>$timer,"sectionCount"=>$count,"pattern"=>$pattern,"active"=>1));
	}
	else
	{
		$cursor = $testPattern->find(array("insertCount"=>"true"));
		$currentCount;
		foreach($cursor as $obj)
		{
			$currentCount=$obj["totalInserts"];
		}
		$currentCount++;
		$id = $id . $currentCount;
		$tPattern=$testPattern->insert(array("fid"=>$_SESSION["fname"],"sid"=>$_SESSION["sid"],"patternid"=>$id,"patternName"=>$patternName,"testTime"=>$timer,"sectionCount"=>$count,"pattern"=>$pattern,"active"=>0));
		$testPattern->update(array("insertCount" => "true"), array('$set' => array("totalInserts" => $currentCount)));
	}
	if($tPattern==1)
	{
	
			header('Location: http://localhost/ecampus/facultyview/facultyhome.php');
			
	
	}
	/*  $cur = $testPattern->find();
	  $Pattern;
	  foreach($cur as $obj)
	  {
		$Pattern = $obj["pattern"];
	}
	
	$i=0;
	
	$count = count($Pattern);
	 while($i<$count)
	{
		 echo "sid=>".$Pattern[$i][0]."<br/>";
		 echo "Count=>".$Pattern[$i][1]."<br/><br/>";
		 $i++;
	 }
	*/
?>