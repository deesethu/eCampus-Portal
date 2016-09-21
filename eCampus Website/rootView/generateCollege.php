<?php

include("mongoConfig.php");
$mdb=mongoConnect();
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (isset($_GET['ch'])) 
{
	
		$colleges = $mdb->selectCollection('colleges');
		
		$cursor = $colleges->find(array("uid"=>$_GET["ch"]));
		
		echo'<select name="collegeName" id="collegeName" value="">';
			echo '<option disabled selected style="display:none;">Select your College</option>';
			foreach($cursor as $obj)
			{
				echo '<option value="'.$obj["collegeName"].'">'.$obj["collegeName"].'</option>';
			}
			
		echo'</select>';

	
}
?>