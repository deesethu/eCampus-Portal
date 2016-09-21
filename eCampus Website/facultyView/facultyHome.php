<?php session_start();
    include "mongoConfigBvrit.php";
    $mdb = mongoConnect();
	if(!isset($_SESSION["fname"])){
	$user=$mdb->selectCollection("facultyDetails");
	$test = $user->find(array("fname"=>$_POST["fname"],"password"=>$_POST["password"]));
	if($test->count()==1){
		$_SESSION["fname"]=$_POST["fname"];
		foreach($test as $obj){
			$_SESSION["sid"] = $obj["sid"];
		}
		}
	else
		header('Location: http://localhost/ecampus/facultyview/facultylogin.php');
	}
    $bDura = $mdb->selectCollection("branches");
	$subjects = $mdb->selectCollection("subjects");
    $sections = $mdb->selectCollection("sections");
    $questions = $mdb->selectCollection("questions");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
	<script>
			
			function changeYear(ajax_page,branch) {
			$.ajax({
				type: "GET",
				url: ajax_page,
				data: "ch="+branch,
				dataType: "html", 
				success: function(html){    
				   $("#Year").html(html);     }
				}); 
		}
		
					
			function changeSubject(ajax_page,year){
			var branch=document.getElementById('branch').value;
			$.ajax({
				type: "GET",
				url: ajax_page,
				data: 'ch='+year+'&bh='+branch,
				dataType: "html", 
				success: function(html){    
				   $("#subject").html(html);     }
				}); 
		}
		
		
		
			</script>
	
	<style type="text/css" media="screen">
		<!--#right-column{width:208px;}
		#right-column-content{font-weight:bold;height:540px;line-height:16px;margin-left:20px;margin-right:20px;margin-top:60px;overflow:hidden;}
		#right-column-content a{color:#595959;}
		#footer{height:59px;margin-left:auto;margin-right:auto;width:962px;}#copyright{display:none;}-->
		#center-column-content{font-weight:normal;line-height:16px;margin-left:20%;margin-top:-20%;}
	    #center-column-content h2{color:#00138b;font-size:15px;margin-top:0px;padding-top:0px;}
		#center-column-content a{color:#00138b;}
		#center-column-content h3{color:#00138b;font-size:12px;text-transform:uppercase;}
		
		
		body{font-size:100%;overflow:scroll;}
		#left-column-content{margin-left:20px;}
		#columns{height:600px;margin-left:auto;margin-right:auto;width:100%;}
		#left-column{width:273px;}
		#c-us{display:none;}
		#nav{float:right;padding-right:3px;}
		#service-times{height:23px;margin-bottom:28px;margin-left:5px;margin-top:55px;}
		#contact-info{height:112px;margin-bottom:36px;margin-left:5px;}
		#bodyCopy{height:270px;margin-top:70px;overflow:hidden;}
		#header-nav{list-style-type:none;margin-bottom:0px;margin-left:0px;margin-top:0px;padding-bottom:30px;padding-left:0px;padding-right:4px;padding-top:70px;}
		#header-nav li{display:inline;padding-right:18px;}
		#header-nav a{color:#55bdf2;text-decoration:none;text-transform:capitalize;}
		#portal-link{float:left;margin-left:-40px;position:absolute;top:0px;}
		#mem-home-link{display:none;}
		#vis-home-link{display:none;}
		.subjectlist {display: none;}
		
	</style>
	<script src="addQuestions.js"></script>
	<script src="patternDetails.js"></script>
	<script src="facultyHome.js"></script>
</head>
<body><br><br>

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
            <ul class="nav pull-right">
						<li class="active"><a href="#"><i class="icon-home icon-white"></i> Home</a></li>
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
	<div id="columns" style="margin-top:10%;">
		<div id="left-column-content">
			<div class="sidebar-nav">
				<div class="btn-toolbar"> 
				
					<div class="btn-group btn-group-vertical">
						<button class="btn btn-inverse btn-small" onclick="showdiv('pattern'); "><i class="icon-book icon-white"></i><font color="#BBBBBB"> Generate Patterns</font></button>
					</div>
				</div>
				<div class="btn-toolbar"> 
					<div class="btn-group btn-group-vertical">
						<button class="btn-toolbar btn btn-inverse btn-small" onclick="showdiv('view_pattern');"><i class="icon-book icon-white"></i><font color="#BBBBBB"> View Patterns</font></button>
					</div>
				</div>
				<div class="btn-toolbar"> 
					<div class="btn-group btn-group-vertical">
						<button class="btn-toolbar btn btn-inverse btn-small" onclick="showdiv('upload_material'); "><i class="icon-book icon-white"></i><font color="#BBBBBB"> Upload Material</font></button>
					</div>
				</div>
				<div class="btn-toolbar"> 
					<div class="btn-group btn-group-vertical">
						<button class="btn-toolbar btn btn-inverse btn-small" onclick="showdiv('upload_questions'); "><i class=" icon-question-sign icon-white"></i><font color="#BBBBBB"> Upload Questions</font></button>
					</div>
				</div>
				<div class="btn-toolbar"> 
					<div class="btn-group btn-group-vertical">
						<button class="btn-toolbar btn btn-inverse btn-small" onclick="showdiv('view_statistics');"><i class="icon-signal icon-white"></i><font color="#BBBBBB"> View Statistics</font></button>
					</div>
				</div>
			</div>
		</div>
		<div id="center-column">
			<div id="center-column-content">
				<div id="pattern" class="form-horizontal" style="display: none;">
				<form method="POST" action="AddTestPattern.php">
				    Pattern Name: <input type="text" name="patternName" id="patternName" value=""/><br><br>
					Test Duration(in hh:mm:ss)<input type="text" id="time" name="time" value=""/><br><br>
               	   <input type="number" id="SecCount" class="input-small" name="SecCount" value="1" min="1"/>&nbsp&nbsp&nbsp;
                    <a id="GenerateSelectForSec" class="btn" id="GenerateSelectForSec" name="GenerateSelectForSec" onclick="generateSections()"> Generate Sections</a><br><br><br><br>
                    <div id="sectionsDiv">
                    </div>
                </form>
				</div>

				<div id="view_pattern" style="display: none;" class="row">
					<div class="span2" style="border:6px groove grey;height:490px;overflow:scroll;">
						<?php
							$testPattern=$mdb->selectCollection("testPattern");
							$cur = $testPattern->find(array("patternid"=>array('$exists'=>true),"fid"=>$_SESSION["fname"]));
							foreach($cur as $obj)
							{
								
								if($obj["active"]==1)
								{
									echo '<input type="radio" name="activePattern" checked="checked" value="'.$obj["patternid"].'" onchange="activePatternChanged(\''.$obj["patternid"].'\')"/>';
								}
								else
								{
									echo '<input type="radio" name="activePattern" value="'.$obj["patternid"].'" onchange="activePatternChanged(this.value)"/>';
								}
								echo '<a href="#" onclick="showPatternDetails(\''.$obj["patternid"].'\')" style="margin-left:6px;margin-top:4px;"><font size="3">'.$obj["patternName"].'</font></a><br/>';
								
							}
						?>    
					</div>
					<center>
					<div class="span8"  style="border:6px groove grey;height:490px;overflow:scroll;">
							<div style="margin-left:5%;margin-top:5%;" id="ViewPatternContentDiv">
							Click on the pattern name to view the details.
							</div>
					</div>
					</center>
				</div>
				<div id="upload_material" style="display: none;">
					<form method="POST" action="uploadFile.php" enctype="multipart/form-data">
					<fieldset>
								<div id="legend">
									<legend class=""><align="center"><font color="#A1A1A1">Material Upload</align></font></legend>
								</div>
								<div class="control-group">
									<label class="control-label" for="branch"><font color="#A1A1A1">Branch</font></label>
									<div class="controls">	
										<select name="branch" id="branch" onchange='changeYear("generateYear.php",this.value);'>
											<option disabled selected style="display:none">Select Branch</option>
											<?php
												$cursor = $bDura->find();
												foreach($cursor as $obj)
												{
													echo '<option value="'.$obj["branchCode"].'">'.$obj["branchAbbv"].'</option>';
												}
											?>
										</select>
										
									</div>	
								</div>
								<div class="control-group">
									<label class="control-label" for="year"><font color="#A1A1A1">Year</font></label>
									<div class="controls">	
										<select name="Year" id="Year" onchange='changeSubject("generateSubject.php",this.value);'>
											<option disabled selected style="display:none">Select Year</option>
										</select>
									</div>	
								</div>
								<div class="control-group">
									<label class="control-label" for="subject"><font color="#A1A1A1">Subject</font></label>
									<div class="controls">	
										<select name="subject" id="subject" >
											<option disabled selected style="display:none">Select Subject</option>
											
											
										</select>
									</div>	
								</div>
								<div class="control-group">
									<label class="control-label" for="chapter"><font color="#A1A1A1">Chapter</font></label>
									<div class="controls">										
									<select  name="chapter" id="chapter">
											<option value selected disabled style="display:none">Select chapter</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
										</select>
									</div>	
								</div>
								<div class="control-group">
									<label class="control-label" for="fileDescription"><font color="#A1A1A1">Material Description</font></label>
										<div class="controls">
										<textarea cols="100" rows="5" id="fileDescription" name="fileDescription" value="" style="margin: 0px 0px 9px; width: 650px; height: 70px;"></textarea>
										<!--<input type="text" id="mname" name="mname" class="input-large">-->
										</div>
								</div>
								
								<div>
									Upload file
										<input type="file" name="UploadedFile" id="UploadedFile"/><br/>
										
										<input type="submit" name="submit" value="submit"/>
								</div>	
								
					</fieldset>
					</form>
				</div>
				<div id="upload_questions" style="display: none;">
					<form method="POST" action="addQuestionsToDb.php">
						<table class="table table-bordered table-stripped span8" onload="clear()">
							<thead>
								<tr>
									<td><input type="submit" class="btn btn-info" value="Save Questions" name="Save Questions"/><a href="#" class="btn btn-info" onclick="Clear()">Clear</a></td>
									<td>Section:
										<select name="secName" id="secName">
											<?php
												$cursor = $sections->find();
												foreach($cursor as $obj)
												{
													echo '<option value="'.$obj["secName"].'">'.$obj["secName"].'</option>';
												}
											?>
										</select>
									</td>
								</tr>
							</thead>
							<tbody>
								<tr>
								<td colspan="2">
								<table class="table table-bordered table-stripped span8">
									<tr>
										<td>Question:</td>
										<td>
											<textarea cols="100" rows="5" id="NewQuestion" name="NewQuestion" style="margin: 0px 0px 9px; width: 650px; height: 70px;"></textarea>
										</td>
									</tr>
									<tr>
										<td colspan="2"><a href="#" class="btn btn-info btn-tiny" onclick="AddMoreOptions()">Add Options</a><a href="#" class="btn btn-info btn-tiny" onclick="RemoveOptions()">Remove Options</a></td>
									</tr>
								</table>
								<table class="table table-bordered table-stripped span8" id="OptionsTable">
									<tr id="OptionTr1">
										<td>1.</td><td><input type="text" id="Option1" name="Option1" value=""/><input type="hidden" value="1" name="OptionCount" id="OptionCount" /></td>
									</tr>
								</table>
								<table class="table table-bordered table-stripped span8">
									<tr>
										<td>Answer:</td><td><input type="number" id="Answer" name="Answer" min="1"/></td>
									</tr>
									<tr>
										<td>Solution</td>
										<td>
											<textarea id="Solution" name="Solution" cols="100" rows="5" style="margin: 0px 0px 9px; width: 650px; height: 70px;"></textarea>
										</td>
									</tr>
								</table>
								</td>
								</tr>
							</tbody>
						</table>
						</form>
				</div>
				<div id="view_statistics" style="display: none;">
				</div>
			</div>
		</div>
	</div>
	
<script>

	var _hidediv = null;
		function showdiv(id) {
			if(_hidediv)
			_hidediv();
			var div = document.getElementById(id);
			div.style.display = 'block';
			_hidediv = function () { 
				div.style.display = 'none'; 
			};
		}

</script>

			
</body>
</html>
	