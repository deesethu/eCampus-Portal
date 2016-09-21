<html>
	<head>
		<script type="text/javascript">
		 function init(time)
		 {
		 var x=time.split(":");
		 timer.init(x[0],x[1],x[2]);
		 }
		var timer = {
			minutes :0,
			seconds : 0,
			elm :null,
			samay : null,
			sep : ':',
			init : function(h,m,s)
			{
		 h = parseInt(h,10);
				m = parseInt(m,10);
				s = parseInt(s,10);
				if(h < 0 || m < 0 || s <0 || isNaN(h) || isNaN(m) || isNaN(s)) { alert('Invalid Values'); return; }
				this.hours = h;
		 this.minutes = m;
				this.seconds = s;
				timer.start();
			},
			start : function()
			{
				this.samay = setInterval((this.doCountDown),1000);
			},
			doCountDown : function()
			{
				if(timer.seconds == 0)
				{
					if(timer.minutes == 0)
					{
			  if(timer.hours == 0)
			  {
				  clearInterval(timer.samay);
				  timerComplete();
				  return;
			  }
			  else
			  {
				  timer.seconds=60;
		   timer.minutes=59;
				  timer.hours--;
			  }
			 }
					else
					{
						timer.seconds=60;
						timer.minutes--;
					}
				}
				timer.seconds--;
				timer.updateTimer(timer.hours,timer.minutes,timer.seconds);
			},
			updateTimer :  function(hr,min,secs)
			{
		 hr = (hr < 10 ? '0'+hr : hr);
				min = (min < 10 ? '0'+min : min);
				secs = (secs < 10 ? '0'+secs : secs);
		 if(hr<=0&&min<=0&&secs<=0)
		  {
		  document.getElementById('hours').style.display="none";
		  document.getElementById('minutes').style.display="none";
		  document.getElementById('seconds').style.display="none";
		  return;
			  }
			 else {
		  document.getElementById('hours').innerHTML=hr ;
		  document.getElementById('minutes').innerHTML=min ;
		  document.getElementById('seconds').innerHTML=secs;
			  }
		 }
		}
		function timerComplete()
		{
			alert('time out buddy!!!');
		}
		</script>
	</head>
	<?php
include "mongoConfigBvrit.php";
$mdb = mongoConnect();
$test=$mdb->selectCollection('testinfo');
$secInfo=$mdb->selectCollection('sections');
$testPattern = $mdb->selectCollection("testPattern");

function retriv_ques($secid,$q){
$mdb = mongoConnect();
$questions=$mdb->selectCollection('questions');
$ques=$questions->find(array("section"=>$secid));
$quesCount=0;
$j=1;
echo "<br>";
foreach($ques as $obj){
	if($quesCount<$q){
		echo $j;
		echo ")";
		echo $obj["question"];
		echo '<br>';
		for($i=1;$i<=4;$i++){
			echo '<input type="radio">'.$obj["options"][$i].'';
			echo "<br>";
		}
		echo "<br>";
		$quesCount++;
		$j++;
	}
	}
}
$cur=$testPattern->find();

foreach($cur as $obj)
{
	$Pattern = $obj["pattern"];
	$timer=$obj["testTime"];
}
echo '<body onload="init('.$timer.');">';
/*<!--<button onclick="init();">Start</button>-->*/
  echo '<div  style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; color:#2A1F55" >Timer <span id="hours"></span>:<span id="minutes"></span>:<span id="seconds"></span></div>';

$i=0;
$count = count($Pattern);
while($i<$count)
{
	$section=$Pattern[$i][0];
	$q=$Pattern[$i][1];
	$i++;
	$secContent=$secInfo->find(array("secid"=>$section));
	echo "<center>";
	foreach($secContent as $obj){
		echo $obj["secName"];
		echo "<br>";
		echo $obj["rules"];
		echo "<br>";
	}
	echo "</center>";
	//$test_insert=$test->insert(array("testid"=>"1","nosec"=>$nosec,"nocat"=>$nocat,"noques"=>$info));

	//$cursor=$test->find(array(),array("noques"=>1));
	/*foreach($cursor as $obj){
		print_r($obj["noques"]);
	}*/
	//for($i=1;$i<=$nosec;$i++){
		//	$q=$noques[$i];
	retriv_ques($section,$q);
}
?>