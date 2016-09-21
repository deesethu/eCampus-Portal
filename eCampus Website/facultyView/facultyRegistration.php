<?php
	include "mongoConfigBvrit.php";
	$mdb=mongoConnect();
	$branch=$mdb->selectCollection("branches");
	$subject=$mdb->selectCollection("subjects");

?>
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
	<style type="text/css" media="screen">
		.wrapper{margin-right:15%;margin-top:4%%;}
		
</style>
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
								<a href="facultyLogin.php" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="icon-home icon-white"></i> Home</a>
							</li>
							<li><a href="fabout.php"><i class="icon-info-sign icon-white"></i> About us</a></li>
							<li><a href="fcontact.php"><i class="icon-envelope icon-white"></i> Contact us</a></li>
							<li><a href="fhelp.php"><i class=" icon-question-sign icon-white"></i> Help</a></li>
						</ul>
					  </div><!--/.nav-collapse -->
					</div>
				  </div>
				</div>

				<div class="row-fluid" style="margin-top:6%;"><br><br>
								
					<div class="span6">
						
						<div>	
						<form class="form-horizontal" method="POST" id="Register" action="facultydb.php">	
							<fieldset>	
								<div id="legend">
									<legend class=""><font color="#A1A1A1">Register</font></legend>
								</div>
								<div class="control-group">
								<!-- Username -->
									<label class="control-label"  for="fname"><font color="#A1A1A1">Username</font></label>
										<div class="controls">
											<input type="text" id="fname" name="fname" placeholder="Username" class="input-large">
											<p class="help-block">Username can contain any letters or numbers, without spaces</p>
										</div>
								</div>
 
								<div class="control-group">
									<!-- E-mail -->
									<label class="control-label" for="email"><font color="#A1A1A1">E-mail</font></label>
										<div class="controls">
											<input type="text" id="email" name="email" placeholder="Enter email id" class="input-large">
											<p class="help-block">Please provide your E-mail</p>
										</div>
								</div>
 
								<div class="control-group">
								<!-- Password-->
									<label class="control-label" for="password"><font color="#A1A1A1">Password</font></label>
										<div class="controls">
											<input type="password" id="password" name="password" placeholder="Enter password" class="input-large">
											<p class="help-block">Password should be at least 6 characters</p>
										</div>
								</div>
								<div class="control-group">
								<!-- Password -->
									<label class="control-label"  for="password_confirm"><font color="#A1A1A1">Re-type Password</font></label>
										<div class="controls">
											<input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm password" class="input-large">
											<p class="help-block">Please confirm password</p>
										</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="branch"><font color="#A1A1A1">Branch</font></label>									
										<div class="controls">
										<select name="branch" id="branch" onchange='changeYear("generateRegYear.php",this.value);'>
											<option disabled selected style="display:none">Select Branch</option>
											<?php
												$bInfo=$branch->find();
												foreach($bInfo as $obj)
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
										<select name="Year" id="Year" onchange='changeSubject("generateRegSubject.php",this.value);'>
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
									<label class="control-label" for="mobile"><font color="#A1A1A1">Mobile</font></label>									
										<div class="controls">
											<input type="text" id="mobile" name="mobile"  placeholder="Enter your mobile number" class="input-large">
										</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="input01"><font color="#A1A1A1">dob</font></label>
										<div class="controls">
											<input type="date" class="input-large" id="dob" name="dob" rel="popover" data-content="Enter your date of birth" data-original-title="DOB" >
	       								</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="input01"><font color="#A1A1A1">Gender</font></label>
									<div class="controls">
										<form action="">			
											<input type="radio" name="gender" value="male"><font color="#A1A1A1">Male</font>
											<input type="radio" name="gender" value="female"><font color="#A1A1A1">Female</font>
										</form>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="college name">College name</label>
										<div class="controls">
											<select name="college" id="college">
												<option disabled selected style="display:none;">Select college</option>
												<?php
												$adminDetails=$mdb->selectCollection("adminDetails");
												$admin = $adminDetails->find(array(),array("collegeName"=>1));
												foreach($admin as $obj){
													$college = $obj["collegeName"];
												}
												echo '<option value="'.$college.'">'.$college.'</option>';
												?>
												</select>
										</div>	
								</div>
								<div class="control-group">
								<!-- Button -->
									<div class="controls">
										<button class="btn btn-inverse">Register</button>
									</div>
								</div>
							</fieldset>
						</form>
						</div>
					</div>	
				</div>
			</div>	
			 <script src="themes/assets/js/jquery.js"></script>
			<script src="themes/assets/js/google-code-prettify/prettify.js"></script>
			<script src="themes/assets/js/bootstrap-transition.js"></script>
			<script src="themes/assets/js/bootstrap-alert.js"></script>
			<script src="themes/assets/js/bootstrap-modal.js"></script>
			<script src="themes/assets/js/bootstrap-dropdown.js"></script>
			<script src="themes/assets/js/bootstrap-scrollspy.js"></script>
			<script src="themes/assets/js/bootstrap-tab.js"></script>
			<script src="themes/assets/js/bootstrap-tooltip.js"></script>
			<script src="themes/assets/js/bootstrap-popover.js"></script>
			<script src="themes/assets/js/bootstrap-button.js"></script>
			<script src="themes/assets/js/bootstrap-collapse.js"></script>
			<script src="themes/assets/js/bootstrap-carousel.js"></script>
			<script src="themes/assets/js/bootstrap-typeahead.js"></script>
			<script src="themes/assets/js/application.js"></script>
			<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
			<script type="text/javascript">
			 $(document).ready(function(){
			 $('input').hover(function()
				{
					$(this).popover('show')
				}
				);
				$("#user").validate({
				rules:{
					fid:"required",
					uname:"required",
					pwd:
						{
							required:true,
							minlength: 6
						}
					branch:"required",
					year:"required",
					college:"required",
					subject:"required"
				}, 
				messages:{
					fid:"Enter your ID number",
					uname:"Enter username",
					branch:"Enter branch",
					year:"Enter year",
					subject:"Enter subject",
					college:"Enter college",
					pwd:{
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
		
		<script type="text/javascript">
			 $(document).ready(function(){
			 $('input').hover(function()
				{
					$(this).popover('show')
				}
				);
				$("#Register").validate({
				rules:{
					username:"required",
					email:
						{	required:true,
							email: true
						},
					password:
						{
							required:true,
							minlength: 6
						},
					password_confirm:
						{
							required:true,
							equalTo: "#password"
						},
					branch: "required",
					year: "required",
					mobile:"required",
					dob: "required",
					gender:"required",
					college:"required"
					
					
				}, 
				messages:{
					username1:"Enter your name",
					email:"Enter a valid email address",
					password1:{
						required:"Enter password",
						minlength:"Password must be minimum 6 characters"
					},
					password_confirm:{
						required:"Retype password",
						equalTo:"Passwords must match"
					},
					branch:"select branch",
					year:"select year",
					mobile:"Enter a valid mobile number Eg: 9999999999",
					dob:"Enter date of birth (DD/MM/YYYY)",
					gender:"Select Gender",
					college:"select your college"
					
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