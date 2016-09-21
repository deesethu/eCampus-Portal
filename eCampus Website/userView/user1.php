<?php session_start();
include "mongoConfigBvrit.php";
$mdb=mongoConnect();
$subjectList=$mdb->selectCollection("subjects");
$user=$mdb->selectCollection("userDetails");		

if(!isset($_SESSION["uname"])){
		$test = $user->find(array("username"=>$_POST["uname"],"password"=>$_POST["password"]));
	if($test->count()==1)
		$_SESSION["uname"]=$_POST["uname"];
	else
		header('Location: http://localhost/ecampus/index.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
    <title>eCampus Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script type="text/javascript" src="../jquery-1.8.3.js"></script>
   <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
   
   <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />

	<link href="../css/layout.css" rel="stylesheet" type="text/css" />
  
	
	<style type="text/css" media="screen">
	body{font-size:100%;overflow:scroll;background:#ffffff;}
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
        
        <script type="text/javascript" src="user.js"></script>
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
						<li class="active"><a href="user1.php"><i class="icon-home icon-white"></i> Home</a></li>
						<li class="divider-vertical"></li>
						<li><a href="mytests.php"><i class="icon-file icon-white"></i> My Tests</a></li>
						<li class="divider-vertical"></li>
						<li><a href="materials.php"><i class="icon-book icon-white"></i> Materials</a></li>
						<li class="divider-vertical"></li>
						<li><a href="forum/index1.php"><i class="icon-comment icon-white"></i> Discussion Forum</a></li>
						<li class="divider-vertical"></li>
						<li><a href="ucontact.php"><i class="icon-envelope icon-white"></i> Contact Us</a></li>
						<li class="divider-vertical"></li>
						<li><a href=""><i class="icon-off icon-white"></i> Log Out</a></li>
						
					</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
		<div id="columns" style="margin-top:10%;">
				<table cellpadding="0" cellspacing="0" border="0" width="100%">
					<tr>
						<td valign="top" id="left-column">
							<div id="left-column-width">
								<div id="submenu">
									<div id="left-column-content">
										<h3>Welcome <?php echo $_SESSION["uname"]; ?>!</h3>
										<font size="5"><br>
											<ul style="list-style:none;">
												<!--<li><a href=""><font face="Traditional Arabic" color="#000000">Syllabus</font></a></li><br>-->
												<li><a href=""><font face="Traditional Arabic" color="#000000">Test Statistics</font></a></li>
												<li><a href="editform.php"><font face="Traditional Arabic" color="#000000">Edit Profile</font></a></li>
											</ul>
										</font>
										
										<h3 align="left"><font face="Traditional Arabic" color="#000000" size="5"><i>Subjects:</i></font></h3>
										<div class="outtaHere" style="margin-left:3%;"> 
											
												<?php
												$uDetail = $user->find(array("username"=>$_SESSION["uname"]));
												foreach($uDetail as $uB){
													$uBranch = $uB["branchCode"];
												}
												$cursor=$subjectList->find(array("branchCode"=>$uBranch));
												echo '<select name="subjectList" id="subjectList" multiple style="height:330px;">
';												foreach($cursor as $obj){
													echo '<option value="'.$obj["sid"].'" onclick="showdiv(\''.$obj["sid"].'\')">'.$obj["subjectName"].'</option>';
														
													/*echo '<div class="btn-toolbar">';
													echo '<div class="btn-group btn-group-vertical">';
													echo '<button class="btn btn-inverse btn-large" value="'.$obj["sid"].'" onclick="showdiv(\''.$obj["sid"].'\')">'.$obj["subjectName"].'</button></div></div>';
													*/
												}
												echo '</select>';
												?>
													
											

										</div>
											
										

									</div>
								</div>
							</div>
						</td>

						<td valign="top" id="center-column">
							<div id="center-column-content">
								<div class="scroll-content" style="left: 300px; position:absolute;width:60%">
								<?php
								
									foreach($cursor as $obj)
									{
										
										echo '<div id="'.$obj["sid"].'" style="display: none;border:6px groove grey;">';
											echo '<div style="margin-left:10%;margin-top:10%;margin-bottom:5%;margin-right:5%;">';
											echo '<h3>'.$obj["subjectName"].'</h3>';
											echo '<p>'.$obj["subjectInfo"].'</p><br><br>';
											echo '<h3>Take Test</h3>';
											echo '<p><button class="btn btn-mini" type="button" onclick="ShowTestPattern(\''.$obj["sid"].'\')">Click here</button> to take a test.<font></p><br><br>';
											echo '<h3>Analyze Test</h3>';
											echo '<p><b>Select a test for review.</b>';
											$testDb = $mdb->selectCollection("testDb");
											$tests = $testDb->find(array("uname"=>$_SESSION["uname"]));
											echo'<select name="testList" id="testList">';
												foreach($tests as $obj){
													echo '<option value="'.$obj["testid"].'">'.$obj["testid"].'</option>';
												}
											echo'</select>';
											echo'&nbsp;&nbsp;<a class="btn" onclick="analyzeTest()">Analyze</a>';
											echo'</p>';
											echo '</div></div>';
											
										}
										
										/*	echo '<div class="accordion" id="accordion'.$obj["sid"].'">';
											//	echo '<div class="accordion-group1">';
												//	echo '<div class="accordion-heading">';
													//	echo '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion'.$obj["sid"].'" href="#collapse'.$obj["sid"].'A'.'">';
														echo ''.$obj["subjectName"].'</a></div>';
																					
													echo '<div id="collapse'.$obj["sid"].'A'.'" class="accordion-body collapse in">';
														echo '<div class="accordion-inner1">';
															echo '<p>'.$obj["subjectInfo"].'</p>
															  </div>
															</div>
													</div>';
												echo '<div class="accordion-group1">';
													echo '<div class="accordion-heading">';
														echo '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion'.$obj["sid"].'" href="#collapse'.$obj["sid"].'B'.'">';
														echo 'Test Pattern</a></div>';
													
													echo '<div id="collapse'.$obj["sid"].'B'.'" class="accordion-body collapse">';
														echo '<div class="accordion-inner1">';
															echo '<p></p>
															</div>
														</div>
													</div>';
												echo '<div class="accordion-group1">';
													echo'<div class="accordion-heading">';
														echo'<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion'.$obj["sid"].'" href="#collapse'.$obj["sid"].'C'.'">';
														echo'Take test
														</a>
													</div>';
													echo'<div id="collapse'.$obj["sid"].'C'.'" class="accordion-body collapse">';
														echo'<div class="accordion-inner1">';
															echo'<p><button class="btn btn-mini" type="button" onclick=" ">Click here</button> to take a test.<font></p>
														</div>
													</div>
												</div>';
												echo'<div class="accordion-group1">';
													echo'<div class="accordion-heading">';
														echo'<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion'.$obj["sid"].'" href="#collapse'.$obj["sid"].'D'.'">';
														echo'Analyze Test
														</a>
													</div>';
													echo'<div id="collapse'.$obj["sid"].'D'.'" class="accordion-body collapse">';
														echo'<div class="accordion-inner1">';
															echo'<p><b>Select a test for review.</b>';
																echo'<select id="test_list">';
																	echo'<option disabled selected style="display:none;">Please Choose</option>';
																	echo'<option value="test1">Test1</option>';
																	echo'<option value="test1">Test2</option>';
																	echo'<option value="test1">Test3</option>';
																	echo'<option value="test1">Test4</option>';	
																echo'</select>';
															echo'</p>';
															echo'<p> <button class="btn btn-small" type="button" onclick="showdiv("review"); ">Analyze all tests</button></p>';
														echo'</div>
													</div>
												</div>
										</div>
									</div>';}
									*/			
										
										?>		
									
									<div id="review" style="display: none;">
										<table class="table">
											<tr>
												<th>Date</th>
												<th>Test</th>
												<th>Total Questions</th>
												<th>Correct Questions</th>
												<th>Total Marks</th>
											</tr>
										</table>
										<div>
											<button class="btn btn-inverse btn-large" value="review" onclick="">Analyze</button>
										</div>
									</div>	
								</div>
									
							</div>
						</td>
						<td valign="top" id="right-column">
							<div id="right-column-width">
								<div id="right-column-content">

								</div>	
							</div>
						</td>
					</tr>
				</table>
	<!-- END CONTENT -->
			</div>
		
	
</body>
</html>