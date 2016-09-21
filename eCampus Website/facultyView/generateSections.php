<?php session_start();
    include "mongoConfigBvrit.php";
    $mdb = mongoConnect();
	if(!isset($_SESSION["fname"],$_SESSION["sid"])){
	header('Location: http://localhost/ecampus/facultyview/facultylogin.php');
	}
    ini_set('displayerrors',1);
    error_reporting(E_ALL);
    
    if(isset($_GET['count']))
    {
        $count=(double)$_GET['count'];
        $sections = $mdb->selectCollection("sections");
        $sec_values=$sections->find();
		echo "<table>";
        for($i=0;$i< $count; $i++)
        {
            $secIdInput = "secIdInput".$i;
            $QuestionCount = "QuestionCount".$i;
			$Marks = "marks".$i;
			echo "<tr><td>";
            echo '<select class="input-medium" name="'.$secIdInput.'" id="'.$secIdInput.'">';
            echo'<option style="display:none;">Select Section</option>';
            foreach($sec_values as $obj)
            {
                echo'<option value="'.$obj["secid"].'">'.$obj["secName"].'</option>';
            }
            echo '</select>';
			echo '</td>';
			echo '<td></td>';
			echo '<td>';
            echo '<p>No Of Questions:</p>';
			echo '</td>';
			echo '<td>';
            echo '<input type="number" class="input-small" min=1 id="'.$QuestionCount.'" name="'.$QuestionCount.'" value="1" /><br/>';
			echo '</td>';
			echo '<td></td>';
			echo '<td>';
            echo '<p>Marks per question:</p>';
			echo '</td>';
			echo '<td>';
            echo '<input type="number" class="input-small" min=1 id="'.$Marks.'" name="'.$Marks.'" value="1" /><br/>';
			echo '</td>';
			echo '</tr>';
		 }
		 echo '</table>';
		 
		 echo'<br/><br/><input type="submit" id="TestPatternSubmitButton" name="Generate Pattern" value="Generate Pattern" />';
      
		
    }
?>