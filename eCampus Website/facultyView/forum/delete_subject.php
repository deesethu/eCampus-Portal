<? ob_start(); ?>
<?php session_start();
//This page let delete a category
include('mongoConfigBvrit.php');
$mdb=mongoConnect();
if(!isset($_SESSION["fname"]))
	header('Location: http://localhost/ecampus/facultyview/facultylogin.php');

if(isset($_GET['id']))
{
	$id = $_GET['id'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="default/style.css" rel="stylesheet" title="Style" />
        <title>Delete a Subject - Forum</title>
			<!-- Le styles -->
    <link href="../../themes/assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../themes/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../../themes/assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../../themes/assets/ico/favicon.ico">
    <link rel="apple-touch-icon" href="../../themes/assets/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../themes/assets/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../themes/assets/ico/apple-touch-icon-114x114.png">
	<script src="../../jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>
	<script src="../../jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.js"></script>
	<script src="../../jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
	<script src="../../themes/assets/js/bootstrap-collapse.js"></script>
	<script src="../../themes/assets/js/application.js"></script>
	<script src="../../themes/assets/js/bootstrap-alert.js"></script>
	<script src="../../themes/assets/js/bootstrap-button.js"></script>
	<script src="../../themes/assets/js/bootstrap-carousel.js"></script>
	<script src="../../themes/assets/js/bootstrap-dropdown.js"></script>
	<script src="../../themes/assets/js/bootstrap-modal.js"></script>
	<script src="../../themes/assets/js/bootstrap-popover.js"></script>
	<script src="../../themes/assets/js/bootstrap-scrollspy.js"></script>
	<script src="../../themes/assets/js/bootstrap-tab.js"></script>
	<script src="../../themes/assets/js/bootstrap-tooltip.js"></script>
	<script src="../../themes/assets/js/bootstrap-transition.js"></script>
	<script src="../../themes/assets/js/bootstrap-typeahead.js"></script>
	<script src="../../themes/assets/js/jquery.js"></script>
    	<style>
	body{font-size:100%;overflow:scroll;}
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
				  </button><br>
				  <font size="8" face="Times New Roman" color="#926C44">eCampus Portal</font>
				  <div class="nav-collapse collapse"><br>
					<ul class="nav pull-right">
								<li><a href="../facultyhome.php"><i class="icon-home icon-white"></i> Home</a></li>
								<li class="divider-vertical"></li>
								<li><a href="../materials.php"><i class="icon-book icon-white"></i> Materials</a></li>
								<li class="divider-vertical"></li>
								<li class="active"><a href="index1.php"><i class="icon-comment icon-white"></i> Discussion Forum</a></li>
								<li class="divider-vertical"></li>
								<li><a href=""><i class="icon-off icon-white"></i> Log Out</a></li>
								
							</ul>
				  </div><!--/.nav-collapse -->
				</div>
			  </div>
			</div>

        <div class="content" style="margin-top:10%;">
		<div class="box">
		<div class="box_left">
					<a href="index1.php" style="font-size:110%;"><b>Subject List</b></a> &gt;
					 Delete the subject
		</div>
			<div class="clean"></div>
		</div>
<?php
if(isset($_POST['confirm']))
{
	$subject=$mdb->selectCollection("dFsubjects");
	$topic=$mdb->selectCollection("dFtopics");
	$topic_delete=$topic->remove(array("parent"=>$id));
	$delete_subject=$subject->remove(array("id"=>$id));
	if($delete_subject == "1"){
		header('Location: http://localhost/ecampus/facultyview/forum/index1.php');
	}		
}
else{
?>	
<form action="delete_subject.php?id=<?php echo $id; ?>" method="post">
	Are you sure you want to delete this subject and all its topics?
    <input type="hidden" name="confirm" value="true" />
    <input type="submit" value="Yes" /> <input type="button" value="No" onclick="javascript:history.go(-1);" />
</form>
<?php
}
?>
		</div>
	</body>
</html>
<? ob_flush(); ?>