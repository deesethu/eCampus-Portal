<?php  session_start();
include ("mongoConfigBvrit.php");
$mdb=mongoConnect();
if(!isset($_SESSION["uname"]))
	header('Location: http://localhost/ecampus/index.php');
?>
<html>
	<head><title>Contact Us</title>
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
		body{font-size:100%;background:#ffffff;}
		.form-actions1 {padding: 10px 30px 10px;margin-top: 18px;margin-bottom: 18px;}
				.btn-group1 .btn1 {float: left;margin-left: 19%;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;}
		
</style>
			
	</head>
	<body>
		
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <font size="8" face="Times New Roman" color="#926C44">eCampus Portal</font>
		  <div class="nav-collapse collapse">
            <ul class="nav pull-right">
						<li><a href="user1.php"><i class="icon-home icon-white"></i> Home</a></li>
						<li class="divider-vertical"></li>
						<li><a href="mytests.php"><i class="icon-file icon-white"></i> My Tests</a></li>
						<li class="divider-vertical"></li>
						<li><a href="materials.php"><i class="icon-book icon-white"></i> Materials</a></li>
						<li class="divider-vertical"></li>
						<li><a href="forum/index1.php"><i class="icon-comment icon-white"></i> Discussion Forum</a></li>
						<li class="divider-vertical"></li>
						<li class="active"><a href="ucontact.php"><i class="icon-envelope icon-white"></i> Contact Us</a></li>
						<li class="divider-vertical"></li>
						<li><a href=""><i class="icon-off icon-white"></i> Log Out</a></li>
						
					</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

			<br><br><br>
				<div class="container">
					<div class="page-header">
					<br><br><br><br>
						<h1>Contact us</h1>
					</div>
					<div class="row">
						<div class="span8">
							<form action="" id="contact-form" class="form-horizontal">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="name">Your Name</label>
										<div class="controls">
											<input type="text" class="input-xlarge" name="name" id="name">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="email">Email Address</label>
										<div class="controls">
											<input type="text" class="input-xlarge" name="email" id="email">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="subject">Subject</label>
										<div class="controls">
											<input type="text" class="input-xlarge" name="subject" id="subject">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="message">Your Message</label>
										<div class="controls">
											<textarea class="input-xlarge" name="message" id="message" rows="3"></textarea>
										</div>
									</div>
									<div class="form-actions1">
									
									<div class="btn-group1">
										<button type="submit" class="btn1 btn-inverse" align="center">Submit</button>
										<button class="btn1 btn-inverse">Cancel</button>
									</div>
									
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			<!-- ***************************************************************************************************************-->
		<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
	  <script type="text/javascript">
	  $(document).ready(function(){
			$('input').hover(function()
		{
			$(this).popover('show')
		}
		);
			$("#contact-form").validate({
				rules:{
					name:"required",
					email:"required"
					
					}, 
				messages:{
							name:"Enter your name",
							email:"Enter a valid email address"
						},
				errorClass: "help-inline",
				errorElement: "span",
				highlight:function(element, errorClass, validClass) {
					$(element).parents('.control-group').addClass('error');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).parents('.control-group').removeClass('error');
					$(element).parents('.control-group').addClass('success');
				} 
			});
		});
	  </script>
		
	</body>
</html>	