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
        $cursor = $testPattern->find(array("patternid"=>$_GET['ch']));
        foreach($cursor as $obj)
        {
            $Pattern[] = $obj["pattern"];
			$secCount = $obj["sectionCount"];
        }
		//print_r($Pattern[0][0][0]);
		echo 'This Pattern contains '.$secCount.' sections.<br/><br/>';	
		echo '<table>';
        $i=0;
	 $count = count($Pattern[0]);
	 while($i<$count)
	 { 
		echo '<tr>';
		echo "<td>Section: ".$Pattern[0][$i][0]."<br/></td></tr>";
	   	echo "<tr><td>No of questions in the section: ".$Pattern[0][$i][1]."</td>";
        echo '</tr>';
				
		 $i++;
	 }
      echo '</table>';
  
    } 
?> 
<?php
   // echo"<p>hello</p>";
?>


