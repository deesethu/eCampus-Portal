<?php
	include "mongoConfig.php";
	$mdb=mongoConnect();

	$universities = $mdb->selectCollection('universities');
	$colleges = $mdb->selectCollection('colleges');	
?>
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
	<script>
	function changeCollege(ajax_page,uid) {
				$.ajax({
					type: "GET",
					url: ajax_page,
					data: "ch="+uid ,
					dataType: "html", 
					success: function(html){    
					   $("#collegeName").html(html);     }
					}); 
				}
	</script>
	
</head>
<body style="background:#ffffff;">

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
					<a href="rootLogin.php" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="icon-home icon-white"></i> Home</a>
				</li>
				<li><a href="../about.php"><i class="icon-info-sign icon-white"></i> About us</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	<div class="container-fluid" style="margin-top:10%;">
		<div class="row-fluid"><br><br>
			<div class="span6">
				<form class="form-horizontal" method="POST" id="Register" action="adminDetails.php">	
					<fieldset>	
						<div id="legend">
							<legend class=""><font color="#A1A1A1">Register</font></legend>
						</div>
						<div class="control-group">
						<!-- Username -->
							<label class="control-label"  for="username"><font color="#A1A1A1">Username</font></label>
							<div class="controls">
								<input type="text" id="username" name="username" placeholder="Username" class="input-large">
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
						<!--mobile-->
						<div class="control-group">
							<label class="control-label" for="mobile"><font color="#A1A1A1">Mobile</font></label>									
							<div class="controls">
								<input type="text" id="mobile" name="mobile"  placeholder="Enter your mobile number" class="input-large">
								<p class="help-block">Mobile number should be a 10-digit number</p>
							</div>
						</div>
						<div class="control-group">
						<!-- Password-->
							<label class="control-label" for="password"><font color="#A1A1A1">Password</font></label>
							<div class="controls">
								<input type="password" id="password" name="password" placeholder="Enter password" class="input-large">
								<p class="help-block">Password should be at least 4 characters</p>
							</div>
						</div>
						<div class="control-group">
						<!-- Confirm Password -->
							<label class="control-label"  for="password_confirm"><font color="#A1A1A1">Re-type Password</font></label>
							<div class="controls">
								<input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm password" class="input-large">
								<p class="help-block">Please confirm password</p>
							</div>
						</div>
						<div class="control-group">
						<!-- University-->
							<label class="control-label"  for="universityName"><font color="#A1A1A1">University</font></label>
							<div class="controls">
								<select name="universityName" id="universityName" value="" onChange='changeCollege("generateCollege.php",this.value);' >
									<option disabled selected style="display:none;">Select University</option>
								<?php
								$cursor = $universities->find();
								foreach($cursor as $obj)
								{
									echo '<option value="'.$obj["uid"].'">'.$obj["universityName"].'</option>';
								}
								?>
								</select>
								<p class="help-block">Please select your university</p>
							</div>
						</div>
						<div class="control-group">
						<!-- College-->
							<label class="control-label"  for="collegeName"><font color="#A1A1A1">College</font></label>
							<div class="controls">
								<select name="collegeName" id="collegeName" value="">
									<option disabled selected style="display:none;">Select your College</option>
								<?php
								/*$cursor1 = $colleges->find();
								foreach($cursor1 as $obj)
								{
									echo '<option value="'.$obj["cid"].'">'.$obj["collegeName"].'</option>';
								}*/
								?>
								</select>
								<p class="help-block">Please select your college</p>
							</div>
						</div>
						<div class="control-group">
						<!-- Button -->
							<div class="controls">
								<button class="btn btn-inverse" type="submit">Register</button>
							</div>
						</div>
					</fieldset>
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
					universityName: "required",
					collegeName: "required",
									
				}, 
				messages:{
					username:"Enter your name",
					email:"Enter a valid email address",
					password:{
						required:"Enter password",
						minlength:"Password must be minimum 6 characters"
					},
					password_confirm:{
						required:"Retype password",
						equalTo:"Passwords must match"
					},
					universityName:"select university",
					collegeName:"select your college"
					
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