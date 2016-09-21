<?php session_start();
include("mongoConfigBvrit.php");
$mdb = mongoConnect();
if(!isset($_SESSION["fname"] , $_SESSION["sid"])){
	header('Location: http://localhost/ecampus/facultyview/facultylogin.php');
}

// checks if any errors occured during upload
if($_FILES["UploadedFile"]["error"] > 0)
{
	echo "error occured";
}
else
{

	 $path = getFilePath($mdb);
	 $path = $path."/";
	 // checks if given path exist
	 if(file_exists($path))
	{
		//// check if a file with the same name exists in the path
		 if(file_exists($path.$_FILES["UploadedFile"]["name"]))
		 {
			 $err="A file with this name already exists";
		}
		else /// uploads the file
		{
		   move_uploaded_file($_FILES["UploadedFile"]["tmp_name"],$path.$_FILES["UploadedFile"]["name"]);
		  AddMaterial($mdb);
		}
	}
	else // makes the directory if it does not exist.
	{
		 mkdir($path,0,true);
		 move_uploaded_file($_FILES["UploadedFile"]["tmp_name"],$path.$_FILES["UploadedFile"]["name"]);
		AddMaterial($mdb);
	}
		
}

function AddMaterial($mdb)
{
	$materials = $mdb->selectCollection("materials");
	
	/// write a function to generate unique mid each time a material is added.
	/// get the facultyname who uploaded from the sesion variable.
	
	$cursor = $materials->find();
	$id="material";
	if($cursor->count() == 0)
	{
		$rowId = array("totalInserts"=>1,"insertCount"=>"true");
		$materials->insert($rowId);
		$id = $id . 1;
		$materials->insert(array("materialId"=>$id,"branchCode"=>$_POST["branch"],"year"=>$_POST["year"],"sid"=>$_POST["subject"],"description"=>$_POST["fileDescription"],"fileName"=>$_FILES["UploadedFile"]["name"],"uploadedBy"=>$_SESSION["fname"],"uploadedOn"=>date("d/m/Y")));
	}
	else
	{
		$cursor = $materials->find(array("insertCount"=>"true"));
		$currentCount;
		foreach($cursor as $obj)
		{
			$currentCount=$obj["totalInserts"];
		}
		$currentCount++;
		$id = $id . $currentCount;
		$materials->insert(array("materialId"=>$id,"branchCode"=>$_POST["branch"],"year"=>$_POST["year"],"sid"=>$_POST["subject"],"description"=>$_POST["fileDescription"],"fileName"=>$_FILES["UploadedFile"]["name"],"uploadedBy"=>$_SESSION["fname"],"uploadedOn"=>date("d/m/Y")));
		$materials->update(array("insertCount" => "true"), array('$set' => array("totalInserts" => $currentCount)));
	}
	
	
	//$materials->insert(array("materialId"=>$_POST["mid"],"branch"=>$_POST["branch"],"year"=>$_POST["year"],"subject"=>$_POST["subject"],"description"=>$_POST["fileDescription"],"fileName"=>$_FILES["UploadedFile"]["name"],"uploadedBy"=>"facultyx","uploadedOn"=>date("d/m/Y")));
}

/// will return the path where the files belonging to this subject must be uploaded.
function getFilePath($mdb)
{
	$path="";
	$subjects = $mdb->selectCollection("subjects");
	$cur = $subjects->find(array("sid"=>$_POST["subject"]));
	foreach($cur as $obj)
	{
		$path = $obj["filePath"];
	}
	return $path;
}

?>



<html>
	<head>
		<meta charset="utf-8">
    <title>eCampus Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<script type="text/javascript" src="faculty.js"></script>
    
	<style id="wrc-middle-css" type="text/css">.wrc_whole_window{	display: none;	position: fixed; 	z-index: 2147483647;	background-color: rgba(40, 40, 40, 0.9);	word-spacing: normal !important;	margin: 0px !important;	padding: 0px !important;	border: 0px !important;	left: 0px;	top: 0px;	width: 100%;	height: 100%;	line-height: normal !important;	letter-spacing: normal !important;	overflow: hidden;}.wrc_bar_window{	display: none;	position: fixed; 	z-index: 2147483647;	background-color: rgba(60, 60, 60, 1.0);	word-spacing: normal !important;	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	margin: 0px !important;	padding: 0px !important;	border: 0px !important;	left: 0px;	top: 0px;	width: 100%;	height: 40px;	line-height: normal !important;	letter-spacing: normal !important;	color: white !important;	font-size: 13px !important;}.wrc_middle {	display: table-cell;	vertical-align: middle;	width: 100%;}.wrc_middle_main {	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	font-size: 14px;	width: 600px;	height: auto;    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/background-body.jpg) repeat-x left top;	background-color: rgb(39, 53, 62);	position: relative;	margin-left: auto;	margin-right: auto;	text-align: left;}.wrc_middle_tq_main {	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	font-size: 16px;	width: 615px;	height: 460px;    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/background-sitecorrect.png) no-repeat;	background-color: white;	color: black !important;	position: relative;	margin-left: auto;	margin-right: auto;	text-align: center;}.wrc_middle_logo {    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/logo.jpg) no-repeat left bottom;    width: 140px;    height: 42px;    color: orange;    display: table-cell;    text-align: right;    vertical-align: middle;}.wrc_icon_warning {	margin: 20px 10px 20px 15px;	float: left;	background-color: transparent;}.wrc_middle_title {    color: #b6bec7;	height: auto;    margin: 0px auto;	font-size: 2.2em;	white-space: nowrap;	text-align: center;}.wrc_middle_hline {    height: 2px;	width: 100%;    display: block;}.wrc_middle_description {	text-align: center;	margin: 15px;	font-size: 1.4em;	padding: 20px;	height: auto;	color: white;	min-height: 3.5em;}.wrc_middle_actions_main_div {	margin-bottom: 15px;	text-align: center;}.wrc_middle_actions_blue_button div {	display: inline-block;	width: auto;	cursor: Pointer;	margin: 3px 10px 3px 10px;	color: white;	font-size: 1.2em;	font-weight: bold;}.wrc_middle_actions_blue_button {	-moz-appearance: none;	border-radius: 7px;	-moz-border-radius: 7px/7px;	border-radius: 7px/7px;	background-color: rgb(0, 173, 223) !important;	display: inline-block;	width: auto;	cursor: Pointer;	border: 2px solid #00dddd;	padding: 0px 20px 0px 20px;}.wrc_middle_actions_blue_button:hover {	background-color: rgb(0, 159, 212) !important;}.wrc_middle_actions_blue_button:active {	background-color: rgb(0, 146, 200) !important;	border: 2px solid #00aaaa;}.wrc_middle_actions_grey_button div {	display: inline-block;	width: auto;	cursor: Pointer;	margin: 3px 10px 3px 10px;	color: white !important;	font-size: 15px;	font-weight: bold;}.wrc_middle_actions_grey_button {	-moz-appearance: none;	border-radius: 7px;	-moz-border-radius: 7px/7px;	border-radius: 7px/7px;	background-color: rgb(100, 100, 100) !important;	display: inline-block;	width: auto;	cursor: Pointer;	border: 2px solid #aaaaaa;	text-decoration: none;	padding: 0px 20px 0px 20px;}.wrc_middle_actions_grey_button:hover {	background-color: rgb(120, 120, 120) !important;}.wrc_middle_actions_grey_button:active {	background-color: rgb(130, 130, 130) !important;	border: 2px solid #00aaaa;}.wrc_middle_action_low {	font-size: 0.9em;	white-space: nowrap;	cursor: Pointer;	color: grey !important;	margin: 10px 10px 0px 10px;	text-decoration: none;}.wrc_middle_action_low:hover {	color: #aa4400 !important;}.wrc_middle_actions_rest_div {	padding-top: 5px;	white-space: nowrap;	text-align: center;}.wrc_middle_action {	white-space: nowrap;	cursor: Pointer;	color: red !important;	font-size: 1.2em;	margin: 10px 10px 0px 10px;	text-decoration: none;}.wrc_middle_action:hover {	color: #aa4400 !important;}</style><script id="wrc-script-middle_window" type="text/javascript" language="JavaScript">var g_inputsCnt = 0;var g_InputThis = new Array(null, null, null, null);var g_alerted = false;/* we test the input if it includes 4 digits   (input is a part of 4 inputs for filling the credit-card number)*/function is4DigitsCardNumber(val){	var regExp = new RegExp('[0-9]{4}');	return (val.length == 4 && val.search(regExp) == 0);}/* testing the whole credit-card number 19 digits devided by three '-' symbols or   exactly 16 digits without any dividers*/function isCreditCardNumber(val){	if(val.length == 19)	{		var regExp = new RegExp('[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}');		return (val.search(regExp) == 0);	}	else if(val.length == 16)	{		var regExp = new RegExp('[0-9]{4}[0-9]{4}[0-9]{4}[0-9]{4}');		return (val.search(regExp) == 0);	}	return false;}function CheckInputOnCreditNumber(self){	if(g_alerted)		return false;	var value = self.value;	if(self.type == 'text')	{		if(is4DigitsCardNumber(value))		{			var cont = true;			for(i = 0; i < g_inputsCnt; i++)				if(g_InputThis[i] == self)					cont = false;			if(cont && g_inputsCnt < 4)			{				g_InputThis[g_inputsCnt] = self;				g_inputsCnt++;			}		}		g_alerted = (g_inputsCnt == 4);		if(g_alerted)			g_inputsCnt = 0;		else			g_alerted = isCreditCardNumber(value);	}	return g_alerted;}function CheckInputOnPassword(self){	if(g_alerted)		return false;	var value = self.value;	if(self.type == 'password')	{		g_alerted = (value.length > 0);	}	return g_alerted;}function onInputBlur(self, bRatingOk, bFishingSite){	var bCreditNumber = CheckInputOnCreditNumber(self);	var bPassword = CheckInputOnPassword(self);	if((!bRatingOk || bFishingSite == 1) && (bCreditNumber || bPassword) )	{		var warnDiv = document.getElementById("wrcinputdiv");		if(warnDiv)		{			/* show the warning div in the middle of the screen */			warnDiv.style.left = "0px";			warnDiv.style.top = "0px";			warnDiv.style.width = "100%";			warnDiv.style.height = "100%";			document.getElementById("wrc_warn_fs").style.display = 'none';			document.getElementById("wrc_warn_cn").style.display = 'none';			if(bFishingSite)				document.getElementById("wrc_warn_fs").style.display = 'block';			else				document.getElementById("wrc_warn_cn").style.display = 'block';			warnDiv.style.display = 'table';		}	}}</script></head>


    <!-- Le styles -->
    <link href="../themes/assets/css/bootstrap.css" rel="stylesheet">
    <link href="../themes/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../themes/assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../themes/assets/ico/favicon.ico">
    <link rel="apple-touch-icon" href="../themes/assets/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../themes/assets/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../themes/assets/ico/apple-touch-icon-114x114.png">
	<script src="../jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>
	<script src="../jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.js"></script>
	<script src="../jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
		<script src="themes/assets/js/bootstrap-collapse.js"></script>
	<script src="../themes/assets/js/application.js"></script>
	<script src="../themes/assets/js/bootstrap-alert.js"></script>
	<script src="../themes/assets/js/bootstrap-button.js"></script>
	<script src="../themes/assets/js/bootstrap-carousel.js"></script>
	<script src="../themes/assets/js/bootstrap-dropdown.js"></script>
	<script src="../themes/assets/js/bootstrap-modal.js"></script>
	<script src="../themes/assets/js/bootstrap-popover.js"></script>
	<script src="../themes/assets/js/bootstrap-scrollspy.js"></script>
	<script src="../themes/assets/js/bootstrap-tab.js"></script>
	<script src="../themes/assets/js/bootstrap-tooltip.js"></script>
	<script src="../themes/assets/js/bootstrap-transition.js"></script>
	<script src="../themes/assets/js/bootstrap-typeahead.js"></script>
	<script src="../themes/assets/js/jquery.js"></script>

	</head>
	<body>
		 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button><br>
		  <font size="8" face="Times New Roman" color="#926C44">eCampus Portal</font>
		  <div class="nav-collapse collapse"><br>
            <ul class="nav pull-right" style="font-size:18px;">
						<li class="active"><a href="facultyHome.php"><i class="icon-home icon-white"></i> Home</a></li>
						<li class="divider-vertical"></li>
						<li><a href="materials.php"><i class="icon-book icon-white"></i> Materials</a></li>
						<li class="divider-vertical"></li>
						<li><a href="forum/index1.php"><i class="icon-comment icon-white"></i> Discussion Forum</a></li>
						<li class="divider-vertical"></li>
						<li><a href=""><i class="icon-off icon-white"></i> Log Out</a></li>
						
					</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<!--/.navbar -->
	
	
		 <table border="1px" style="margin-top:15%;margin-left:30%;">
		 <tr>
			<th>Filename</th>
			<th>Subject</th>
			<th>Description</th>
			<th>UploadedOn</th>
		 </tr>
		 <?php
			$subjects = $mdb->selectCollection("subjects");
			$materials = $mdb->selectCollection("materials");
			$cursor = $materials->find();
			foreach($cursor as $obj)
			{
				echo "<tr>";
					echo '<td>'.$obj["fileName"].'<br/><em>'.$obj["uploadedBy"].'</em></td>';
					$sid=$obj["sid"];
					$sFind=$subjects->find(array("sid"=>$sid));
					foreach($sFind as $sF){
						echo '<td>'.$sF["subjectName"].'</td>';
					}
					echo '<td>'.$obj["description"].'</td>';
					echo '<td>'.$obj["uploadedOn"].'</td>';
				echo "</tr>";
			}
		 ?>
		 </table>
	
	</body>
</html>
