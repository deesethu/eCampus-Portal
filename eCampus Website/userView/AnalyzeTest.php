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

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
    <title>eCampus Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script type="text/javascript" src="../jquery-1.8.3.js"></script>
   <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
   <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="../css/layout.css" rel="stylesheet" type="text/css" />
	<style type="text/css" media="screen">
	body{font-size:100%;overflow:scroll;background:#ffffff;}
	</style>
	<script type="text/javascript" src="user.js"></script>
	<script type="text/javascript" src="d3.v3.min.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
     
    var graphJsonString = <?php echo "'".$_GET["graphJson"]."'";?>;
	var graph = JSON.parse(graphJsonString);
    var newnodes = [['Sections','Max','Obtained']];
	
    for (var i = 0; i < graph.length; i++) { 
		newnodes.push([graph[i][0], graph[i][1]*graph[i][2],graph[i][2]*graph[i][3]]);
    }
  
     google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(newnodes);

        var options = {
          title: 'Marks'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
<div id="chart_div" style="width: 900px; height: 500px;"></div>
	
</body>
</html>