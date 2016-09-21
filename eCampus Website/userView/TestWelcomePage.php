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
    $QuestionsList = array();

 function getQuestions($secId,$count,$marks,$questions){
        global $TestQestions;
        $cur = $questions->find(array("sid"=>$_GET["sub"],"secid"=>$secId));
        //echo "cur->count: ".$cur->count()." secId:".$secId." count:".$count." index".$index;
        //echo "<br/>";
        if($cur->count()<$count){
            return "fail";
            }
        else{
            $j =0;
            foreach($cur as $obj)
            {
                //echo "j: ".$j." obj: ".$obj["qid"];
              //  print_r($obj);
                //echo"<br/>";
                if($j<$count){
                    $obj["question"] = preg_replace('/"/',"",preg_replace("/'/","",preg_replace('/\s/',' ',$obj["question"])));
        			$obj["options"] = preg_replace('/"/',"",preg_replace("/'/","",preg_replace('/\s/',' ',$obj["options"])));
        			$obj["answer"] = preg_replace('/"/',"",preg_replace("/'/","",preg_replace('/\s/',' ',$obj["answer"])));
        			$obj["solution"] = preg_replace('/"/',"",preg_replace("/'/","",preg_replace('/\s/',' ',$obj["solution"])));
                    $obj["marks"] = $marks;
					$TestQestions[]= $obj;
                    
                    $j++;    
                }
                else{
                    break;
                }
                
            }
        }
        return "ok";
        
        
    }

if(isset($_GET["sub"])){
    
    $testPattern = $mdb->selectCollection("testPattern");
    $cur = $testPattern->findOne(array("sid"=>$_GET["sub"],"active"=>1));
    $PatternId = $cur["patternid"];
    $Pattern = $cur["pattern"];
    $TimeDuration = $cur["testTime"];
    $PatternName = $cur["patternName"];
    $subjects = $mdb->selectCollection("subjects");
    $sub = $subjects->findOne(array("sid"=>$_GET["sub"]));
    $subName = $sub["subjectName"];
    $branch = $sub["branchAbbv"];
    $year = $sub["year"];
	echo "<script> var pid ='".$PatternId."';</script>";
	
    $TestQestions=  array();
    $QuestionsCount =0;
     $i=0;
     while($i<count($Pattern))
    { 
        $QuestionsCount += $Pattern[$i][1];
        $i++;
    }
    $i=0;
     
    while($i<count($Pattern))
    {  
        
        //echo "section: ".$Pattern[$i][0]."  count: ".$Pattern[$i][1];
        //echo"<br/>";
        $res = getQuestions($Pattern[$i][0],$Pattern[$i][1],$Pattern[$i][2],$questions);
        if($res == "fail")
        {
            echo "<script>alert('Sorry.You cannot take this test cause of DATA INSUFFICIENCY');</script>";
            header("Location: user1.php");
            break;
        }
     /*   else
        {
            echo "<br/>entered into loop<br/>";
            $tem = 0;
            while($tem< count($TestQestions))
            {
                print_r($TestQestions[$tem]);
                echo"<br/>";
                $tem++;
            }
            
            /*
            $k=0;
            
            while($j< $tCount)
            {
                $QuestionsList[$j]=$TestQestions[$k];
                $k++;
                $j++;
            }  
        } */
        $i++;
    }
    $QuestionsJsonString = json_encode($TestQestions);
    
   
}

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
	</style>
	
</head>
<body style="">
    <center>
        <h3>Welcome, <?php echo $_SESSION["uname"]?>  </h3>
  
    <table class="table table-stripped table-bordered span7" style="left: 250px;top:120px;position:absolute;">
        <tbody>
            <tr>
                <th class="span2" style="background-color: #f5f5f5;">Subject Name:</th><td><?php echo $subName;?></td>
                
            </tr>
            <tr>
                <th style="background-color: #f5f5f5;">Branch:</th><td><?php echo $branch;?></td>
                
            </tr>
            <tr>
                <th style="background-color: #f5f5f5;">Year:</th><td><?php echo $year;?></td>
                
            </tr>
        </tbody>
    </table>
		<br />
      
	<table class="table table-stripped table-bordered span7" style="left: 250px;top:250px;position:absolute;">
    <caption>
        <?php  echo $PatternName."[Duration: ".$TimeDuration."]"; ?>
    </caption>
    <thead>
        <tr style="background-color: #f5f5f5;">
            <th>SNo.</th>
            <th>Section Name</th>
            <th>No of questions</th>
            <th>Marks per question</th>
            <th>Total marks</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $i=0;
            $marks=0;
            $questionsCount=0;
			
            while($i<count($Pattern)){
                echo "<tr>";
                    echo"<td>".($i+1).".</td>";
                    echo"<td>".$Pattern[$i][0]."</td>";
                    echo"<td>".$Pattern[$i][1]."</td>";
                    echo"<td>".$Pattern[$i][2]."</td>";
                    echo"<td>".($Pattern[$i][2] * $Pattern[$i][1])."</td>";
                    $marks += ($Pattern[$i][2] * $Pattern[$i][1]);
                    $questionsCount +=$Pattern[$i][1];
                echo "</tr>";
                $i++;
            }
            echo "<tr>";
                    echo"<td>Total</td>";
                    echo"<td>".count($Pattern)." sections</td>";
                    echo"<td>".$questionsCount." questions</td>";
                    echo"<td colspan='2'> Max marks: ".$marks."</td>";
                echo "</tr>";
                echo "<script>  var QuestionsCount =".$questionsCount.";  </script>";
        ?>
    </tbody>
    </table>
    <?php
        if($PatternName != "")
        {
            echo "<script>  var index = 0;  </script>";
            echo "<script>  var jsonString = $.parseJSON('".$QuestionsJsonString."');  </script>";
            //JSON.parse('".$QuestionsJsonString."');
          echo "<a href='#TestModal' class='btn btn-info' onclick=\"GetQuestion()\" data-toggle='modal'>Start Test</a>";
        }
        
        
    ?>
    
     </center>
    <div class="modal hide fade" id="TestModal" style="width: 90%; height:550px; left:5%;margin:5px;top:10px;position:absolute">
        <div class="modal-header" id="TestModalHeader">
            <a href="#" class="btn btn-danger pull-right" data-dismiss="modal" aria-hidden="true">Cancel Test</a>
           <p class="small">Implement timer here</p>
           <center> 
                <h4>Subject: <?php echo $subName?></h3>
                <h6 class="success" style="color: #ff0000;">Do not reload the page.</h6>
            </center>

        </div>
        <div class="modal-body" id="TestModalBody" style="height: 500px;">
            <div id="QuestionDiv">             
            </div>
            <div id="OptionsDiv">
            </div>
            <a href="#" style="top: 520px; position:fixed" class="btn btn-info pull-left" onclick="GoToPreviousQuestion()" >Back</a>
            <a href="#" class="btn btn-info pull-right" style="top: 520px; left:90%; position:fixed" onclick="GoToNextQuestion()">Next</a>
        </div>
        <div class="modal-footer" id="TestModalFooter">
            
            <a href="#" class="btn btn-primary" onclick="FinishTest()">Finish Test</a>
        </div>
    </div>
    
    <script type="text/javascript">
				var AnswersArray = new Array();
				var temp = 0;
				function FinishTest(){
					var i=0;
					var TestStorageArray = new Array();
					while(i<QuestionsCount){
						var tsa = new Array();
						tsa[0] = jsonString[i].qid;
						tsa[1] = AnswersArray[i];
						tsa[2] = (jsonString[i].answer == AnswersArray[i])? true : false;
						tsa[3] = jsonString[i].marks;
						TestStorageArray[i] = tsa;
						i++;
					}
					var testString = JSON.stringify(TestStorageArray);
					
					$.post('AddFinishedTestToDb.php',{Test:testString,Pattern:pid},function(data){
						window.location.href = "testFinishPage.php?testid="+data;
					});
				}
				while(temp<QuestionsCount)
				{
					AnswersArray[temp]=0;
					temp++;
				}
				function CaptureAnswer(i,val){
					AnswersArray[i] = val;
				}
            function GetQuestion(){
                $("#QuestionDiv").empty();
                $("#OptionsDiv").empty();
                $("<p>").html(" "+(index+1)+". "+ jsonString[index].question).appendTo("#QuestionDiv");
                var j=0;
                while(j<jsonString[index].options.length)
                { 
					$oName = "options"+index;
                    $("<input>",{type:"radio",name:$oName,value:(j+1),text:jsonString[index].options[j],onchange:"CaptureAnswer(index,this.value)"}).appendTo("#OptionsDiv"); 
                    $("<span>").html(" "+jsonString[index].options[j]+"<br/><br/>").appendTo("#OptionsDiv");
                    j++;    
                }
                  
            }
            function GoToPreviousQuestion()
            {
                if(index > 0)
                {
                    index--;
                    GetQuestion();
                }
            }
            function GoToNextQuestion()
            {
                if(index < QuestionsCount-1)
                {
                    index++;
                    GetQuestion();
                }
            }
    
   </script>
</body>
</html>