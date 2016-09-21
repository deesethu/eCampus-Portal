<?php session_start();
include "mongoConfigBvrit.php";
$mdb=mongoConnect();
$questions = $mdb->selectCollection("questions");
if(!isset($_SESSION["uname"])){
	$user=$mdb->selectCollection("userDetails");
	$test = $user->find(array("username"=>$_POST["uname"],"password"=>$_POST["password"]));
	if($test->count()==1)
		$_SESSION["uname"]=$_POST["uname"];
	else
		header('Location: /ecampus/index.php');
}  
$testDb = $mdb->selectCollection("testDb");
$questions = $mdb->selectCollection("questions");
$testPattern = $mdb->selectCollection("testPattern"); 
   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
    <title>eCampus Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script type="text/javascript" src="../jquery-1.8.3.js"></script>
   <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
   
   <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<style type="text/css" media="screen">
	body{font-size:100%;overflow:scroll;background:#ffffff;}
	.testQuestionsDiv{
		background-color:#f5dfc7;
		moz-border-radius: 15px;
		web-kit-border-radius: 15px;
		border: 10px solid;
		border-color:#e4ceb6;
	}
	.questionP{
		background-color:#e4ceb6;
		padding:10px;
		//moz-border-radius: 15px;
		//web-kit-border-radius: 15px;
		//border-radius-top: 15px;
	}
	.optionsDiv{
		padding-left:10px;
	}
	.answerDiv{
	padding:10px;
	}
	.solutionDiv{
	background-color:#e4ceb6;
	padding:10px;
	}
	.scoreDiv{
		background-color:#f5dfc7;
		padding:5px;
		padding-left:15px;
		border: 10px solid;
		border-color:#e4ceb6;
	}
	</style>
</head>
<body>
	<div class="span2"></div>
   <div class="span10">
		<br/>
		<?php
			$cursor = $testDb->findOne(array("testid"=>$_GET["testid"]));
			$ques = $cursor["questions"];
			$score = 0;
			$correctCount = 0;
			$i=0;
			while($i<count($ques))
			{ 
				echo "<div class='testQuestionsDiv' >";
					echo "<div class='questionP' >";
						$cur = $questions->findOne(array("qid"=>$ques[$i][0]));
						echo "<span class='badge pull-right'>".$ques[$i][3]."M</span>";
						echo "<p>[".($i+1)."] ".$cur["question"]."</p>";
					echo "</div>";
					$j=0;
					echo "<div class='optionsDiv'>";
					while($j<count($cur["options"]))
					{
						echo "<p>".($j+1).". ".$cur["options"][$j]."</p>";
						$j++;
					}
					echo "</div>";
					echo "<div class='answerDiv'>";
					if($ques[$i][2])
					{
				
						echo "<p  style='color:#008000;'>Your Answer: ".$ques[$i][1]." [Correct] </p>";
						$score = $score + $ques[$i][3];
						$correctCount++;
					}
					else
					{
						echo "<p style='color:#ff0000;'>Your Answer: ".$ques[$i][1]." [Wrong] </p>";
						echo "<p>Answer: ".$cur["answer"]."</p>";
					}
					echo "</div>";
					echo "<div class='solutionDiv'>";
					echo "<p>Solution: ".$cur["solution"]."</p>";
					echo "</div>";
				echo "</div><br/>";
				$i++;
			}
			echo "<div class='scoreDiv' >";
				echo "<p>Total score: ".$score."</p>";
				echo "<p>Total number of questions: ".$i."</p>";
				echo "<p>Total number of Correct questions: ".$correctCount."</p>";
				echo "<p>Total number of Wrong questions: ".($i-$correctCount)."</p>";
			echo "</div>";
		
		?>
   </div>
  
</body>
</html>