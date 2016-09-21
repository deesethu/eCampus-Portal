<?php session_start();
include ("mongoConfigBvrit.php");

$mdb = mongoConnect();
if(!isset($_SESSION["fname"] and $_SESSION["sid"])){
	header('Location: http://localhost/ecampus/facultyview/facultylogin.php');
	}
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['ch'])) 
{

		$categories = $mdb->selectCollection("categories");
		
		$cursor = $categories->find(array("secid"=>$_GET["ch"]));
		
		echo'<select name="cate" id="cate">';
			echo'<option>-Select-</option>';
			
			foreach($cursor as $obj)
			{
				echo'<option value="'.$obj["catid"].'">'.$obj["catName"].'</option>';
			}
			
		
		echo'</select>';

	
}

?>