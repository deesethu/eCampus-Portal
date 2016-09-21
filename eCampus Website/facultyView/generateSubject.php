<?php session_start();
include ("mongoConfigBvrit.php");

$mdb = mongoConnect();
if(!isset($_SESSION["fname"])){
	header('Location: http://localhost/ecampus/facultyview/facultylogin.php');
	}
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (isset($_GET['ch'],$_GET['bh'])) 
{

		//$matSub = $mdb->selectCollection("matSubjects");
		$subjects = $mdb->selectCollection("subjects");

		$cursor = $subjects->find(array("year"=>$_GET["ch"],"branchCode"=>$_GET["bh"]));
		
		echo'<select name="Year" id="Year">';
			echo'<option disabled selected style="display:none">Select Subject</option>';
			
			foreach($cursor as $obj)
			{
				echo'<option value='.$obj["sid"].'>'.$obj["subjectName"].'</option>';
				
			}
			
		
		echo'</select>';

	
}

?>