<?php
    include ("mongoConfigBvrit.php");
    $mdb = mongoConnect();
    
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
	<!--<style id="wrc-middle-css" type="text/css">.wrc_whole_window{	display: none;	position: fixed; 	z-index: 2147483647;	background-color: rgba(40, 40, 40, 0.9);	word-spacing: normal !important;	margin: 0px !important;	padding: 0px !important;	border: 0px !important;	left: 0px;	top: 0px;	width: 100%;	height: 100%;	line-height: normal !important;	letter-spacing: normal !important;	overflow: hidden;}.wrc_bar_window{	display: none;	position: fixed; 	z-index: 2147483647;	background-color: rgba(60, 60, 60, 1.0);	word-spacing: normal !important;	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	margin: 0px !important;	padding: 0px !important;	border: 0px !important;	left: 0px;	top: 0px;	width: 100%;	height: 40px;	line-height: normal !important;	letter-spacing: normal !important;	color: white !important;	font-size: 13px !important;}.wrc_middle {	display: table-cell;	vertical-align: middle;	width: 100%;}.wrc_middle_main {	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	font-size: 14px;	width: 600px;	height: auto;    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/background-body.jpg) repeat-x left top;	background-color: rgb(39, 53, 62);	position: relative;	margin-left: auto;	margin-right: auto;	text-align: left;}.wrc_middle_tq_main {	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	font-size: 16px;	width: 615px;	height: 460px;    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/background-sitecorrect.png) no-repeat;	background-color: white;	color: black !important;	position: relative;	margin-left: auto;	margin-right: auto;	text-align: center;}.wrc_middle_logo {    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/logo.jpg) no-repeat left bottom;    width: 140px;    height: 42px;    color: orange;    display: table-cell;    text-align: right;    vertical-align: middle;}.wrc_icon_warning {	margin: 20px 10px 20px 15px;	float: left;	background-color: transparent;}.wrc_middle_title {    color: #b6bec7;	height: auto;    margin: 0px auto;	font-size: 2.2em;	white-space: nowrap;	text-align: center;}.wrc_middle_hline {    height: 2px;	width: 100%;    display: block;}.wrc_middle_description {	text-align: center;	margin: 15px;	font-size: 1.4em;	padding: 20px;	height: auto;	color: white;	min-height: 3.5em;}.wrc_middle_actions_main_div {	margin-bottom: 15px;	text-align: center;}.wrc_middle_actions_blue_button div {	display: inline-block;	width: auto;	cursor: Pointer;	margin: 3px 10px 3px 10px;	color: white;	font-size: 1.2em;	font-weight: bold;}.wrc_middle_actions_blue_button {	-moz-appearance: none;	border-radius: 7px;	-moz-border-radius: 7px/7px;	border-radius: 7px/7px;	background-color: rgb(0, 173, 223) !important;	display: inline-block;	width: auto;	cursor: Pointer;	border: 2px solid #00dddd;	padding: 0px 20px 0px 20px;}.wrc_middle_actions_blue_button:hover {	background-color: rgb(0, 159, 212) !important;}.wrc_middle_actions_blue_button:active {	background-color: rgb(0, 146, 200) !important;	border: 2px solid #00aaaa;}.wrc_middle_actions_grey_button div {	display: inline-block;	width: auto;	cursor: Pointer;	margin: 3px 10px 3px 10px;	color: white !important;	font-size: 15px;	font-weight: bold;}.wrc_middle_actions_grey_button {	-moz-appearance: none;	border-radius: 7px;	-moz-border-radius: 7px/7px;	border-radius: 7px/7px;	background-color: rgb(100, 100, 100) !important;	display: inline-block;	width: auto;	cursor: Pointer;	border: 2px solid #aaaaaa;	text-decoration: none;	padding: 0px 20px 0px 20px;}.wrc_middle_actions_grey_button:hover {	background-color: rgb(120, 120, 120) !important;}.wrc_middle_actions_grey_button:active {	background-color: rgb(130, 130, 130) !important;	border: 2px solid #00aaaa;}.wrc_middle_action_low {	font-size: 0.9em;	white-space: nowrap;	cursor: Pointer;	color: grey !important;	margin: 10px 10px 0px 10px;	text-decoration: none;}.wrc_middle_action_low:hover {	color: #aa4400 !important;}.wrc_middle_actions_rest_div {	padding-top: 5px;	white-space: nowrap;	text-align: center;}.wrc_middle_action {	white-space: nowrap;	cursor: Pointer;	color: red !important;	font-size: 1.2em;	margin: 10px 10px 0px 10px;	text-decoration: none;}.wrc_middle_action:hover {	color: #aa4400 !important;}</style><script id="wrc-script-middle_window" type="text/javascript" language="JavaScript">var g_inputsCnt = 0;var g_InputThis = new Array(null, null, null, null);var g_alerted = false;/* we test the input if it includes 4 digits   (input is a part of 4 inputs for filling the credit-card number)*/function is4DigitsCardNumber(val){	var regExp = new RegExp('[0-9]{4}');	return (val.length == 4 && val.search(regExp) == 0);}/* testing the whole credit-card number 19 digits devided by three '-' symbols or   exactly 16 digits without any dividers*/function isCreditCardNumber(val){	if(val.length == 19)	{		var regExp = new RegExp('[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}');		return (val.search(regExp) == 0);	}	else if(val.length == 16)	{		var regExp = new RegExp('[0-9]{4}[0-9]{4}[0-9]{4}[0-9]{4}');		return (val.search(regExp) == 0);	}	return false;}function CheckInputOnCreditNumber(self){	if(g_alerted)		return false;	var value = self.value;	if(self.type == 'text')	{		if(is4DigitsCardNumber(value))		{			var cont = true;			for(i = 0; i < g_inputsCnt; i++)				if(g_InputThis[i] == self)					cont = false;			if(cont && g_inputsCnt < 4)			{				g_InputThis[g_inputsCnt] = self;				g_inputsCnt++;			}		}		g_alerted = (g_inputsCnt == 4);		if(g_alerted)			g_inputsCnt = 0;		else			g_alerted = isCreditCardNumber(value);	}	return g_alerted;}function CheckInputOnPassword(self){	if(g_alerted)		return false;	var value = self.value;	if(self.type == 'password')	{		g_alerted = (value.length > 0);	}	return g_alerted;}function onInputBlur(self, bRatingOk, bFishingSite){	var bCreditNumber = CheckInputOnCreditNumber(self);	var bPassword = CheckInputOnPassword(self);	if((!bRatingOk || bFishingSite == 1) && (bCreditNumber || bPassword) )	{		var warnDiv = document.getElementById("wrcinputdiv");		if(warnDiv)		{			/* show the warning div in the middle of the screen */			warnDiv.style.left = "0px";			warnDiv.style.top = "0px";			warnDiv.style.width = "100%";			warnDiv.style.height = "100%";			document.getElementById("wrc_warn_fs").style.display = 'none';			document.getElementById("wrc_warn_cn").style.display = 'none';			if(bFishingSite)				document.getElementById("wrc_warn_fs").style.display = 'block';			else				document.getElementById("wrc_warn_cn").style.display = 'block';			warnDiv.style.display = 'table';		}	}}</script>-->
    <!-- Le styles -->
    <link href="themes/assets/css/bootstrap.css" rel="stylesheet">
    <link href="themes/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="themes/assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="themes/assets/ico/favicon.ico">
    <link rel="apple-touch-icon" href="themes/assets/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="themes/assets/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="themes/assets/ico/apple-touch-icon-114x114.png">
    <script src="jquery-1.9.1.min.js"></script>
    
	<style type="text/css" media="screen">
		body{;font-family:Lucida Grande, Lucida Sans;font-size:100%;font-style:inherit;font-weight:inherit;background-repeat:repeat;}
	
		#center-column-content{font-weight:normal;line-height:16px;margin-left:20%;margin-right:25%;margin-top:-18%;}
	    #left-column-content{margin-left:20px;}
		#columns{height:600px;margin-left:auto;margin-right:auto;overflow:hidden;width:100%;}
		#left-column{width:273px;}
		#right-column{width:208px;}
		#right-column-content{font-weight:bold;height:540px;line-height:16px;margin-left:20px;margin-right:20px;margin-top:60px;overflow:hidden;}
		#footer{height:59px;margin-left:auto;margin-right:auto;width:962px;}#copyright{display:none;}
		#c-us{display:none;}
		#nav{float:right;padding-right:3px;}
		#center-column-content h2{color:#00138b;font-size:15px;margin-top:0px;padding-top:0px;}
		#center-column-content a{color:#00138b;}
		#center-column-content h3{color:#00138b;font-size:12px;text-transform:uppercase;}
		#service-times{height:23px;margin-bottom:28px;margin-left:5px;margin-top:55px;}
		#contact-info{height:112px;margin-bottom:36px;margin-left:5px;}
		#right-column-content a{color:#595959;}
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
</head>
<body>
    <form method="POST" action="AddQuestionsToDb.php">
    <table class="table table-bordered table-stripped span8">
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
                    <td>1.</td>
					<td><input type="text" id="Option1" name="Option1" value=""/>
						<input type="hidden" value="1" name="OptionCount" id="OptionCount" />
					</td>
                </tr>
            </table>
            <table class="table table-bordered table-stripped span8">
                <tr>
                    <td>Answer:</td><td><input type="number" id="Answer" name="Answer" min="1" max="<script>document.getElementById('OptionCount').value;</script>"/></td>
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
</body>



</html>
	