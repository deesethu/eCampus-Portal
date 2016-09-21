<?php session_start();
	include("mongoConfigBvrit.php");
	$mdb=mongoConnect();
	if(!isset($_SESSION["fname"]))
	header('Location: http://localhost/ecampus/facultyview/facultylogin.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
	<meta charset="utf-8">
    <title>eCampus Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="default/style.css" rel="stylesheet" title="Style" />
        
	
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
								<li class="active"><a href="#"><i class="icon-comment icon-white"></i> Discussion Forum</a></li>
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
					<a href="index1.php" style="font-size:110%;"><b>Subject List</b></a>
				</div>
				<div class="clean"></div>
			</div>
			<br><br>
			
			<a href="new_subject.php" class="button" style="font-size:110%;"><i><u>Create a New Subject</u></i></a>
			<br><br>
			<table class="categories_table">
			<tr>
				<th class="forum_cat">Subject List</th>
				<th class="forum_ntop">Topics</th>
				<th class="forum_nrep">Replies</th>
				<th class="forum_act">Action</th>
			</tr>
			
			<?php 
				$subject=$mdb->selectCollection("dFsubjects");
				$subject_find= $subject->find();
				$subject_count=$subject->count();
				foreach($subject_find as $subject_obj){
				
				echo '<tr>	
						<td class="forum_cat"><a href="list_topics.php?parent='.$subject_obj["id"].' " class="title"><center>'.$subject_obj["name"].'</a>
						<div class="description">'.$subject_obj["description"].'</div>
						</td>
							<td>';
							
						$topic=$mdb->selectCollection("dFtopics");
						$topic_find=$topic->find(array("parent"=>$subject_obj['id'],"id2"=>"1"));
						$topic_count=$topic_find->count();
						echo $topic_count;				
						
						echo '</td>
						<td>';
						$topic_reply=$topic->find(array("parent"=>$subject_obj['id'],"id2"=>array('$ne'=>"1")));
						$topic_rep_count=$topic_reply->count();
						echo $topic_rep_count;
					
								
						echo '</td>
						<td>';
						if($_SESSION["fname"] == $subject_obj["authorID"]){
						echo '<a href="delete_subject.php?id='.$subject_obj['id'].'"><img src="default/images/delete.png" alt="Delete" /></a>';
						}
						echo '</td>';
						echo '</tr>';
					
			}
			?>
			</table>
			
			
	</body>
</html>