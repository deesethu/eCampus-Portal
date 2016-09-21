<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
    <title>eCampus Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../themes/assets/css/bootstrap.css" rel="stylesheet">
    <link href="../themes/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../themes/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
	<link href="../css/layout.css" rel="stylesheet" type="text/css" />
    <link href="../css/menu.css" rel="stylesheet" type="text/css" />
	<link href="../themes/assets/css/display.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="./themes/assets/ico/favicon.ico">
    <link rel="apple-touch-icon" href="./themes/assets/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./themes/assets/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./themes/assets/ico/apple-touch-icon-114x114.png">
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
	<script type="text/javascript">
			 $(document).ready(function(){
			 $('input').hover(function()
				{
					$(this).popover('show')
				}
				);
				$("#admin").validate({
				rules:{
					uname:"required",
					password:
						{
							required:true,
							minlength: 6
						}
				}, 
				messages:{
					uname:"Enter username",
					password:{
						required:"Enter password",
						minlength:"Password must be minimum 6 characters"
					}
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
</head>
<body style="background:#ffffff;"><br><br><br>
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
            <ul class="nav">
				<li class="active">
					<a href="#" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="icon-home icon-white"></i> Home</a>
				</li>
				<li><a href="../about.php"><i class="icon-info-sign icon-white"></i> About us</a></li>
				
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	<div class="span3 offset4" style="margin-top:10%;">
		<form class="form-horizontal" method="POST" id="admin" action="rootUser.php">
			<fieldset>
				<div id="legend">
					<legend class=""><font color="#A1A1A1">Admin Login</font></legend>
				</div>
				<div class="control-group">
				<!-- Username -->
					<label class="control-label"  for="uname">Username</label>
					<div class="controls">
						<input type="text" id="uname" name="uname" placeholder="Username" class="input-large">
					</div>
				</div>
				<div class="control-group">
				<!-- Password-->
					<label class="control-label" for="password">Password</label>
					<div class="controls">
						<input type="password" id="password" name="password" placeholder="Enter password" class="input-large">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="checkbox">
							<input type="checkbox"><font color="#A1A1A1"> Remember me</font>
						</label>
					</div>
				</div>
				<div class="control-group">
				<!-- Button -->
					<div class="controls">
						<button class="btn btn-inverse" type="submit" >Login</button>&nbsp&nbsp&nbsp&nbsp;
						New User?<a href="rootRegistration.php"><u> Click here</u></a>
					</div>
				</div>
			<fieldset>
		</form>
	</div>
</body>
</html>					