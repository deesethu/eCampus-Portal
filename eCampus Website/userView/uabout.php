<?php  session_start();
include ("mongoConfigBvrit.php");
$mdb=mongoConnect();
if(!isset($_SESSION["uname"]))
	header('Location: http://localhost/ecampus/index.php');
?>

<html>
	<head>
	<title>About eCampus Portal</title>
			<link href="../themes/assets/css/bootstrap.css" rel="stylesheet">
    <link href="../themes/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../themes/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
<link href="../css/layout.css" rel="stylesheet" type="text/css" />
        <link href="../css/menu.css" rel="stylesheet" type="text/css" />
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
	<script src="../themes/assets/js/bootstrap-collapse.js"></script>
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
	<style type="text/css" media="screen">
		body{background-image:url('img_bg.jpg');font-family:Lucida Grande, Lucida Sans;font-size:100%;font-style:inherit;font-weight:inherit;background-size:100% 100%;background-repeat:no-repeat;}
		.hero-unit1{ padding: 60px;margin-bottom: 30px;background-color: #A1A1A1; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px;}
		.hero-unit1 p {font-size: 18px;font-weight: 200;line-height: 27px;}
		

</style>		
			
	</head>
	<body><br><br><br>
	
<div class="navbar navbar-inverse navbar-fixed-top">
					<div class="navbar-inner">
						<div class="container-fluid">
							<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
							<a class="brand" href="#">
								<br><font size="13" face="Viner Hand ITC">&nbsp&nbsp;eCampus Portal</font>
							</a><br><br>
						 <!--**********************-->
							<div class="pull-right">
								<ul id="navi">
									<li><a href="user1.php"><i class="icon-home icon-white"></i>Home</a></li>
									<li><a href="uabout.php"><i class="icon-info-sign icon-white"></i>About Us</a></li>
									<li><a href="mytests.php"><i class="icon-file icon-white"></i>My Tests</a></li>
									<li><a href="materials.php"><i class="icon-book icon-white"></i>Materials</a></li>
									<li><a href="forum/index1.php"><i class="icon-comment icon-white"></i> Discussion Forum</a></li>
									<li><a href="ucontact.php"><i class="icon-envelope icon-white"></i> Contact Us</a></li>
									<li><a href="<?php session_unset(); ?>"><i class="icon-off icon-white"></i>Logout</a></li>
									<div id="lavalamp"></div>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br><br><br>
				<div class="container-fluid">
					<div class="row-fluid">
						<div class="span9">
							<div class="hero-unit1">
								<h1>About us</h1><br>
								<p>
									jkfhgfguhhuh hlhfgkfjfkg hhhhhhhhhhhhhhhhhh hhhhhhhhhhhhhhhhh hhhhhhhhhhh hhhhhhhhhhhhhhhhhhhh hhhhhhhhhhhhhhhhh hkkkkkkkkkk  kkkkkkkkkkkkkkkk kkkkkkkkkkk kkkkkkkkkkkkkkk uuuuuuuuuu u    u uhuhuhjijuijiojijj
									hjghgjkhihjhuhuh huhuhuhuhuihifdhuih uihuihuihilhfvdhuihu hhhuvhhfguhfuhjuhuh hhfvhuihuihiluhuhuiuhuiu uhiuuuhhuh uhuiuihuhuihuhuih uhuiuh uuihuihuihhu huihuihuuhuhuh uhuh
								</p>
							</div>
						</div>
						<div class="span3" >
							<div class="height:70%">
								<h4><font color="#ffffff" size="3">News</h4>
												
							<div class="hero-unit1">
							
							
							</div>
							</div>	
						</div>
					</div>
				</div>
	</body>
</html>