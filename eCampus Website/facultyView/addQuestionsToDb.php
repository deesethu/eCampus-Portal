<?php session_start();

    include ("mongoConfigBvrit.php");
    $mdb = mongoConnect();
    if(!isset($_SESSION["fname"] , $_SESSION["sid"])){
	header('Location: http://localhost/ecampus/facultyview/facultylogin.php');
	}
    $questions = $mdb->selectCollection("questions");

	
    $oCount = $_POST["OptionCount"];
    $Options;
    $i=1;
    while($i<=$oCount)
    {
        $Options[] = $_POST["Option".$i];
        $i++;
    }
	
	$cursor = $questions->find();
	$id="ques";
	if($cursor->count() == 0)
	{
		$rowId = array("totalInserts"=>1,"insertCount"=>"true");
		$questions->insert($rowId);
		$id = $id . 1;
		$quesInsert=$questions->insert(array("fid"=>$_SESSION["fname"],"sid"=>$_SESSION["sid"],"qid"=>$id,"section"=>$_POST["secName"],"question"=>$_POST["NewQuestion"],"options"=>$Options,"answer"=>$_POST["Answer"],"solution"=>$_POST["Solution"]));
	}
	else
	{
		$cursor = $questions->find(array("insertCount"=>"true"));
		$currentCount;
		foreach($cursor as $obj)
		{
			$currentCount=$obj["totalInserts"];
		}
		$currentCount++;
		$id = $id . $currentCount;
		$quesInsert=$questions->insert(array("fid"=>$_SESSION["fname"],"sid"=>$_SESSION["sid"],"qid"=>$id,"section"=>$_POST["secName"],"question"=>$_POST["NewQuestion"],"options"=>$Options,"answer"=>$_POST["Answer"],"solution"=>$_POST["Solution"]));
		$questions->update(array("insertCount" => "true"), array('$set' => array("totalInserts" => $currentCount)));
	}
   // $questions->insert(array("qid"=>"q0","section"=>$_POST["secName"],"question"=>$_POST["NewQuestion"],"options"=>$Options,"answer"=>$_POST["Answer"],"solution"=>$_POST["Solution"]));
	if($quesInsert==1)
	{
		
	}
   
?>
	