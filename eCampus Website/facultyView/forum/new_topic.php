<? ob_start(); ?>
<?php session_start();
//This page let users create new topics
include('mongoConfigBvrit.php');
$mdb=mongoConnect();
if(!isset($_SESSION["fname"]))
	header('Location: http://localhost/ecampus/facultyview/facultylogin.php');

if(isset($_GET['parent']))
{
	$id = $_GET['parent'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="default/style.css" rel="stylesheet" title="Style" />
        <title>New Topic - Forum</title>
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
		<script type="text/javascript" src="functions.js"></script>
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
					<a href="list_topics.php?parent=<?php echo $id; ?>">Topic List</a> &gt; New Topic		
		</div>
			<div class="clean"></div>
		</div>
        
    	
<?php
if(isset($_POST['message'], $_POST['title']) and $_POST['title']!='')
{
	$title = $_POST['title'];
	$message = $_POST['message'];
	$topic=$mdb->selectCollection('dFtopics');
	$topic_insert=$topic->insert(array("parent"=>$id,"tid"=>"$title$id","id"=>"","id2"=>"1","title"=>$title,"message"=>$message,"authorID"=>$_SESSION["fname"]));
	if($topic_insert == "1"){
		header('Location: http://localhost/ecampus/facultyView/forum/list_topics.php?parent='.$id.'');
	}
}
else
{
?>
<form action="new_topic.php?parent=<?php echo $id; ?>" method="post">
	<label for="title">Title</label><input type="text" name="title" id="title"  /><br />
    <label for="message">Message</label><br />
    <textarea name="message" id="message" cols="70" rows="6"></textarea><br />
    <input type="submit" value="Send"/>
</form>
<?php
}
?>
		</div>
	</body>
</html>
<? ob_flush(); ?>