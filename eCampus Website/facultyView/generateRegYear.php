<?php session_start();
include ("mongoConfigBvrit.php");

$mdb = mongoConnect();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['ch'])) 
{

		$bDura = $mdb->selectCollection("branches");
		$cursor = $bDura->find(array("branchCode"=>$_GET['ch']));
		echo'<select name="Year" id="Year">';
			echo'<option disabled selected style="display:none">Select Year</option>';
			
			foreach($cursor as $obj)
			{
				$year = $obj['nOfYears'];
				for($i=1;$i<=$year;$i++)
				{
				echo'<option value='.$i.'>'.$i.'</option>';
				}
			}
			
		
		echo'</select>';

	
}
?>