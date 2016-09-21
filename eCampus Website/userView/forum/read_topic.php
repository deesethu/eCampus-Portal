<? ob_start(); ?>
<?php session_start();
//This page display a topic
include('mongoConfigBvrit.php');
$mdb=mongoConnect();
if(!isset($_SESSION["uname"]))
	header('Location: http://localhost/ecampus/main.php');

if(isset($_GET['tid'], $_GET['parent']))
{
	$tid = $_GET['tid'];
	$subID = $_GET['parent'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="default/style.css" rel="stylesheet" title="Style" />
        <title>Forum</title>
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
		<link href="default/style.css" rel="stylesheet" title="Style" />
		
		<style>
		body{font-size:100%;overflow:scroll;}
			
		</style>
					<script>
				var _hidediv = null;
				function showdiv(id) {
					if(_hidediv)
						_hidediv();
					var div = document.getElementById(id);
					div.style.display = 'block';
					_hidediv = function () { 
						div.style.display = 'none'; 
					};
				}
			</script>
	</head>
    <body><br>
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
						<li><a href="../user1.php"><i class="icon-home icon-white"></i> Home</a></li>
						<li class="divider-vertical"></li>
						<li><a href="../mytests.php"><i class="icon-file icon-white"></i> My Tests</a></li>
						<li class="divider-vertical"></li>
						<li><a href="../materials.php"><i class="icon-book icon-white"></i> Materials</a></li>
						<li class="divider-vertical"></li>
						<li class="active"><a href="index1.php"><i class="icon-comment icon-white"></i> Discussion Forum</a></li>
						<li class="divider-vertical"></li>
						<li><a href="../ucontact.php"><i class="icon-envelope icon-white"></i> Contact Us</a></li>
						<li class="divider-vertical"></li>
						<li><a href=""><i class="icon-off icon-white"></i> Log Out</a></li>
						
					</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    	
        <div class="content" style="margin-top:10%;">
<div class="box">
	<div class="clean"></div>
</div>
<a href="index1.php">Subject List</a> &gt;
<a href="list_topics.php?parent=<?php echo $subID; ?>">Topic List</a>
<h1>title</h1>
<table class="messages_table">
	<tr>
    	<th class="author">Author</th>
    	<th>Message</th>
	</tr>
	<?php
		$topics=$mdb->selectCollection("dFtopics");
    	$reply_find= $topics->find(array("parent" =>$subID,"tid"=>$tid,"id2"=>array('$ne'=>"1")));
		
		foreach($reply_find as $reply_obj){
		
	echo '<tr>
    	<td class="author center"><br />'.$reply_obj["authorID"].'</td>
    	<td class="left"><div class="edit">';
			echo $reply_obj["message"];
		
		echo '<div class="clean"></div>
    	</td>';                          
		if($_SESSION["uname"] == $reply_obj["authorID"]){			echo '<td><a href="delete_reply.php?parent='.$subID.'&tid='.$tid.'&id='.$tid.$reply_obj["message"].'"><img src="default/images/delete.png" alt="Delete" /></a></td>';
		}
		else
			echo '<td></td>';
    echo '</tr>';
	}
	?>
	</table>
	<input class="button" type="submit" value="Reply" onclick="showdiv('newReply'); "/>
	<div id="newReply" style="display: none;">
<?php
if(isset($_POST['message']) and $_POST['message']!='')
{
	$message = $_POST['message'];
	$reply=$mdb->selectCollection('dFtopics');
	$reply_insert=$reply->insert(array("parent"=>$subID,"tid"=>$tid,"id"=>$tid.$message,"id2"=>"","title"=>"","message"=>$message,"authorID"=>$_SESSION["uname"]));
	if($reply_insert == "1"){
		header('Location: http://localhost/ecampus/userview/forum/read_topic.php?tid='.$tid.'&parent='.$subID.'');
	}
}
else
{
?>
<form action="read_topic.php?tid=<?php echo $tid; ?>&parent=<?php echo $subID; ?>" method="post">
    <label for="message">Message</label><br />
    <textarea name="message" id="message" cols="70" rows="6"></textarea><br />
    <input type="submit" value="Send" />
</form>
<?php
}
?>


</div>

		</div>
	</body>
</html>
<? ob_flush(); ?>