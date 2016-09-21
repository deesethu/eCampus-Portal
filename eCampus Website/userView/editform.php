<?php session_start();
include ("mongoConfigBvrit.php");
$mdb=mongoConnect();

if(!isset($_SESSION["uname"]))
	header('Location: http://localhost/ecampus/index.php');
//print_r($_SESSION["uname"]);	
//$uid="u4";
$userDetails = $mdb->selectCollection("userDetails");
$branches=$mdb->selectCollection("branches");
$details=$userDetails->find(array("username"=>$_SESSION["uname"]));
foreach($details as $a)
{
}
    
?>	
<html>
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
        <link href="../css/menu.css" rel="stylesheet" type="text/css" />
      
	<style>body{font-size:100%;background:#ffffff;overflow:scroll;}</style>
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
						<li><a href="ucontact.php"><i class="icon-envelope icon-white"></i> Contact Us</a></li>
						<li class="divider-vertical"></li>
						<li><a href=""><i class="icon-off icon-white"></i> Log Out</a></li>
						
					</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


	<div class="row-fluid" style="margin-top:15%;">
				<div class="pull-right">
					<form class="form-horizontal" method="POST" action="edit.php">
						<fieldset>
								<div id="legend">
									<legend class="">Edit Registration form</legend>
								</div>
								<div class="control-group">
								
							<?php //echo "USERNAME : ". $a["username"]?>
								
								<!-- Username -->
									<label class="control-label"  for="username">Username</label>
									<div class="controls">
										<input type="text" id="name" name="name" value="<?php echo$a["username"]?>"  class="input-large">
										<p class="help-block">Username can contain any letters or numbers, without spaces</p>
									</div>
								</div>
 								<div class="control-group">
									<!-- E-mail -->
									<label class="control-label" for="email">E-mail</label>
									<div class="controls">
										<input type="text" id="email" name="email" value="<?php echo $a["email"]?>" class="input-large">
										<p class="help-block">Please provide your E-mail</p>
									</div>
								</div>
									
 								<!--<div class="control-group">
								<!-- Password
									<label class="control-label" for="pwd"><font color="#A1A1A1">Password</font></label>
									<div class="controls">
										<input type="pwd" id="pwd" name="pwd" value="<?php echo $a["pwd"]?>" class="input-large">
										<p class="help-block">Password should be at least 4 characters</p>
									</div>
								</div>
								<div class="control-group">
								<!-- Password
									<label class="control-label"  for="pwd_confirm"><font color="#A1A1A1">Re-type Password</font></label>
									<div class="controls">
										<input type="password" id="pwd_confirm" name="pwd_confirm" value="<?php echo $a["password"]?>" class="input-large">
										<p class="help-block">Please confirm password</p>
									</div>
								</div>-->
								<div class="control-group">
									<label class="control-label" for="branch">Branch</label>									
										<div class="controls">
											<select name="branch" id="branch" class="input-large">
											<?php
												$branch=$branches->find(array("branchCode"=>$a["branchCode"]));
												foreach($branch as $b){
													$branchAbbv=$b["branchAbbv"];
												}
											?>
												<option value="<?php echo $a["branchCode"];?>"><?php echo $branchAbbv;?></option>
												<?php
													$branches = $mdb->selectCollection("branches");
													$cursor = $branches->find();
													$yCount;
													foreach($cursor as $obj)
													{
														if($a["branch"] != $obj["bFullName"])
														{	echo '<option value="'.$obj["bFullName"].'">'.$obj["bFullName"].'</option>';}
														else
														{ $yCount = $obj["nOfYears"];}
													}
												?>
											</select>	
										</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="year">Year</label>									
										<div class="controls">
											<select name="year" id="year" class="input-large">
												<option value="<?php echo $a["year"]?>"><?php echo $a["year"]?></option>
												<?php
													$i = 1;
													while($i<=$yCount)
													{
														if($i != $a["year"])
														echo '<option value="'.$i.'">'.$i.'</option>';
														$i++;
													}
												?>
											</select>
										</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="mobile">Mobile number</label>									
									<div class="controls">
										<input type="text" id="mobile" name="mobile" value="<?php echo $a['mobile']?>" class="input-large">
									</div>
								</div>
								
								<!--
								<div class="control-group">
									<label class="control-label" for="dob"><font color="#A1A1A1">Date of birth</font></label>
									<div class="controls">
										<input type="date" class="input-large" id="dob" name="dob" value="<?php echo $a["dob"]?>" rel="popover" data-content="Enter your date of birth" data-original-title="DOB" >
	       							</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="college"><font color="#A1A1A1">College name</font></label>
									<div class="controls">
										<input type="textarea:rows="5" cols="3" id="college" name="college" value="<?php echo$a["college"]?>" class="input-large">
									</div>	
								</div>
								-->
								<div class="control-group">
								<!-- Button -->
									<div class="controls">
										<button class="btn btn-inverse">UPDATE</button>
									</div>
								</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>			
	</body>
</html>		