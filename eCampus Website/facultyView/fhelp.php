<?php session_start();
if(!isset($_SESSION["fname"] and $_SESSION["sid"])){
	header('Location: http://localhost/ecampus/facultyview/facultylogin.php');
	}
?>

<html>
	<head>
		<title>eCampus Portal</title>
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
			
	</head>
       <body>
			<div class="container-fluid">
				<div class="navbar navbar-inverse navbar-fixed-top">
				  <div class="navbar-inner">
					<div class="container-fluid">
					  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button><br>
					  <font size="8" face="Times New Roman"  color="#926C44">eCampus Portal</font>
					  <div class="nav-collapse collapse"><br>
						<ul class="nav">
							<li>
								<a href="facultyLogin.php" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="icon-home icon-white"></i> Home</a>
							</li>
							<li><a href="fabout.php"><i class="icon-info-sign icon-white"></i> About us</a></li>
							<li><a href="fcontact.php"><i class="icon-envelope icon-white"></i> Contact us</a></li>
							<li class="active"><a href="#"><i class=" icon-question-sign icon-white"></i> Help</a></li>
						</ul>
					  </div><!--/.nav-collapse -->
					</div>
				  </div>
			</div>
		</div>
		</body>
</html>		