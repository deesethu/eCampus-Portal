<html>
	<head>
		<title>Welcome to eCampus Portal</title>
		<meta charset="utf-8">
		 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Animated Web Banners With CSS3 - Exploring ways to spice up our web banners with CSS3 animations." />
        <meta name="keywords" content="css3, animation, animated, ads, ad, banner, content" />
        <meta name="author" content="Caleb Jacob for Codrops" />
		<link href="../themes/assets/css/bootstrap.css" rel="stylesheet">
		<link href="../themes/assets/css/bootstrap-responsive.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
		 <link href="../themes/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
		 <link href='http://fonts.googleapis.com/css?family=Alfa+Slab+One' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Boogaloo' rel='stylesheet' type='text/css'>

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
	<script src="../themes/assets/js/google-code-prettify/prettify.js"></script>
	<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>

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
		  <font size="8" face="Times New Roman">eCampus Portal</font>
		  <div class="nav-collapse collapse"><br>
            <ul class="nav">
				<li class="active">
					<a href="#" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="icon-home icon-white"></i> Home</a>
				</li>
				<li><a href="fabout.php"><i class="icon-info-sign icon-white"></i> About us</a></li>
				<li><a href="fcontact.php"><i class="icon-envelope icon-white"></i> Contact us</a></li>
				<li><a href="fhelp.php"><i class=" icon-question-sign icon-white"></i> Help</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
				
			
				<div class="row-fluid" style="margin-top:15%;">
					<div class="span5">
						<form class="form-horizontal" method="POST" id="user" action="facultyHome.php">
							<fieldset>
								<div id="legend">
									<legend class=""><font color="#A1A1A1">Login</font></legend>
								</div>
								<div class="control-group">
								<!-- Username -->
									<label class="control-label"  for="fname"><font color="#A1A1A1">Username</font></label>
										<div class="controls">
											<input type="text" id="fname" name="fname" placeholder="Username" class="input-large">
										</div>
								</div>
								<div class="control-group">
								<!-- Password-->
									<label class="control-label" for="password"><font color="#A1A1A1">Password</font></label>
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
										New User?<a href="facultyregistration.php"><u> Click here</u></a>
									</div>
								</div>
							<fieldset>
						</form>
					</div>
				</div>
				</div>
				
			 <script type="text/javascript">
			 $(document).ready(function(){
			 $('input').hover(function()
				{
					$(this).popover('show')
				}
				);
				$("#user").validate({
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
		
	</body>
</html>