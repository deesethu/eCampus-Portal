<?php session_start();
include "mongoConfigBvrit.php";
$mdb=mongoConnect();
$subjectList=$mdb->selectCollection("subjects");
$user=$mdb->selectCollection("userDetails");		

if(!isset($_SESSION["uname"])){
		$test = $user->find(array("username"=>$_POST["uname"],"password"=>$_POST["password"]));
	if($test->count()==1)
		$_SESSION["uname"]=$_POST["uname"];
	else
		header('Location: http://localhost/ecampus/index.php');
}

$testDb = $mdb->selectCollection("testDb");
$cursor = $testDb->findOne(array("testid"=>$_GET["testId"]));

$testPattern = $mdb->selectCollection("testPattern");
$pattern = $testPattern->findOne(array("patternid"=>$cursor["patternid"]));

$i=0;
$sections;
while($i<count($pattern["pattern"]))
{
	$sections[$i][0] = $pattern["pattern"][$i][0];
	$sections[$i][1] = $pattern["pattern"][$i][1];
	$sections[$i][2] = $pattern["pattern"][$i][2];
	$sections[$i][3] = 0;
	$i++;
}

$j=0;
$p=0;

while($j<count($sections))
{
	$k=0;
	while($k<$sections[$j][1])
	{
		//echo "j : $j k : $k cur[ques][k][2]: ".$cursor["questions"][$k][2]."<br/>";
		if($cursor["questions"][$p][2])
		{
			$sections[$j][3]++;
		}
		$k++;
		$p++;
	}
	$j++;
}

$graphJson = json_encode($sections);

?>
<html>
<head>
	<script type="text/javascript">
		function showGraph(graphJson)
		{
			window.location.href = "AnalyzeTest.php?graphJson="+graphJson;
		
		}
	</script>
</head>
<body>
<?php
echo "<script> showGraph('".$graphJson."')</script>";
?>
</body>
</html>