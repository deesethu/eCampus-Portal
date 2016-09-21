<?php
	include "mongoConfigBvrit.php";
	$mdb=mongoConnect();
	$materials=$mdb->selectCollection("materials");
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
						<li class="active"><a href="materials.php"><i class="icon-book icon-white"></i> Materials</a></li>
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
<div class="span5 offset5" style="margin-top:15%;">
	<table id="mat" border="1">
		<tr>
			<th>Subject</th>
			<th>File</th>
		</tr>
		<?php
			$subjects=$mdb->selectCollection("subjects");
			$mat=$materials->find();
			foreach($mat as $obj){
				//print_r($obj);
				echo '<tr>';
				$sid=$obj["sid"];
					$sFind=$subjects->find(array("sid"=>$sid));
					foreach($sFind as $sF){
						echo '<td>'.$sF["subjectName"].'</td>';
					}
				echo '<td><a href="download.php?filename='.$obj["fileName"].'">'.$obj["fileName"].'</a></td>';
				echo '</tr>';
			}
			
		?>
	</table>
</div>
</body>
</html>