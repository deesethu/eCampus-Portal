<?php session_start();

     include ("mongoConfigBvrit.php");
    $mdb = mongoConnect();
	if(!isset($_SESSION["fname"],$_SESSION["sid"])){
	header('Location: http://localhost/ecampus/facultyview/facultylogin.php');
	}
    ini_set('displayerrors',1);
    error_reporting(E_ALL);
    $Pattern;
    if(isset($_GET['ch']))
    {
		$testPattern = $mdb->selectCollection("testPattern");
		$testPattern->update(array("active" => 1), array('$set' => array("active" => 0)));
		$testPattern->update(array("patternid" => $_GET['ch'] ), array('$set' => array("active" => 1)));
		echo "Active pattern changed";
    }
?> 



