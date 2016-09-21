<?php session_start();
	include "mongoConfigBvrit.php";
	$mdb = mongoConnect();
	$branch = $mdb->selectCollection("branches");
	$subject = $mdb->selectCollection("subjects");
	if(!isset($_SESSION["uname"])){
	$admin=$mdb->selectCollection("adminDetails");
	$adminValid = $admin->find(array("username"=>$_POST["uname"],"password"=>$_POST["password"]));
	if($adminValid->count()==1)
		$_SESSION["uname"]=$_POST["uname"];
	else
		header('Location: http://localhost/ecampus/rootview/rootlogin.php');
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
	<script src="rootUser.js"></script>
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

		/*function saveRecords(tableid)
		{
			var rowCount = $("#"+tableid+" tbody tr").length;
			var rows = $("#"+tableid+" tbody").children();
			$data;
			for(var i=0; i<rowCount;i++)
			{
				$data[i][0] = $($(rows[i]).children()[1]).children("input").val();
				$data[i][1] =$($(rows[i]).children()[2]).children("input").val();
				$data[i][2] =$($(rows[i]).children()[3]).children("input").val();
				$data[i][3] =$($(rows[i]).children()[4]).children("input").val();
				
				
			
			}
		}*/
	</script>
	
</head>
<body style="overflow:scroll;background:#ffffff;"><br><br><br><br>
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
						<li><a href=""><i class="icon-off icon-white"></i> Log Out</a></li>
						
					</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	<div class="span3" style="margin-top:10%;">
	<div class="btn-toolbar"> 
		<div class="btn-group btn-group-vertical">
			<button class="btn btn-inverse btn-small" onclick="showdiv('add_dept')"><i class="icon-book icon-white"></i> Add Departments</button>
		</div>
	</div>
	
	
	<div class="btn-toolbar"> 
		<div class="btn-group btn-group-vertical">
			<button class="btn-toolbar btn btn-inverse btn-small" onclick="showdiv('add_subjects')"><i class="icon-book icon-white"></i> Add Subjects</button>
		</div>
	</div>
	
	<div class="btn-toolbar"> 
		<div class="btn-group btn-group-vertical">
			<button class="btn btn-inverse btn-small" onclick="showdiv('View_dept')"><i class="icon-book icon-white"></i> View Departments</button>
		</div>
	</div>
	
	<div class="btn-toolbar"> 
		<div class="btn-group btn-group-vertical">
			<button class="btn btn-inverse btn-small" onclick="showdiv('View_subjects')"><i class="icon-book icon-white"></i> View subjects</button>
		</div>
	</div>
	</div>
	<div class="span9" style="margin-top:15%;">
	<div id="add_dept" style="display:none;">
		<div id="tablediv">
			<INPUT type="button" value="Add Row" onclick="addRow('dataTable')" />
			<INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" />
			<table id="dataTable" border="1">
				<thead>
					<th></th>
					<th>Branch Code</th>
					<th>Branch Name</th>
					<th>Branch Abbrevation</th>
					<th>No of years</th>
				</thead>
				<tbody>
					<tr>
						<TD><INPUT type="checkbox" name="chk"/></TD>
						<TD><INPUT type="text" name="txt"/></TD>
						<TD><INPUT type="text" name="txt"/></TD>
						<TD><INPUT type="text" name="txt"/></TD>
						<TD><INPUT type="text" name="txt"/></TD>
					</tr>
				</tbody>
				<INPUT type="button" value="Save" onclick="getValues('dataTable')" />
			</table>
		</div>
	</div>
	<div id="View_dept" style="display:none;">
		<div id="tablediv">
			<table id="dataTable" name="dataTable" border="1">
				<thead>
					<th>Branch Code</th>
					<th>Branch Name</th>
					<th>Branch Abbrevation</th>
					<th>No of years</th>
				</thead>
				<tbody>
			
		<?php
			$branchInfo = $branch->find();
			foreach($branchInfo as $obj){
					$bCode=$obj["branchCode"];
					echo '<tr>';
						echo '<td>'.$obj["branchCode"].'</td>';
						echo '<td>'.$obj["branchName"].'</td>';
						echo '<td>'.$obj["branchAbbv"].'</td>';
						echo '<td>'.$obj["nOfYears"].'</td>';
						/*echo '<td><button class="btn" onclick="edit(\''.$obj["branchCode"].'\')">edit</button></td>';
						echo '<td><button class="btn" onclick="update">Update</button></td>';*/
						echo '</tr>';
			}
		?>	
			
			</tbody>
				
			</table>
		</div>
	</div>
		
		<?php
/*			$branchInfo = $branch->find();
			foreach($branchInfo as $obj){
					echo '<tr>';
						echo '<td><input type="text" name="txt" value="'.$obj["branchCode"].'"/></td>';
						echo '<td><input type="text" name="txt" value="'.$obj["branchName"].'"/></td>';
						echo '<td><input type="text" name="txt" value="'.$obj["branchAbbv"].'"/></td>';
						echo '<td><input type="text" name="txt" value="'.$obj["nOfYears"].'"/></td>';
					echo '</tr>';
			}*/
		?>
			
	
	<div id="add_subjects" style="display:none;">
	<div id="tableSub">
			<INPUT type="button" value="Add Row" onclick="addRow('subjectTable')" />
			<INPUT type="button" value="Delete Row" onclick="deleteRow('subjectTable')" />
			<table id="subjectTable" border="1">
				<thead>
					<th></th>
					<th>Subject Name</th>
					<th>Subject Information</th>
					<th>Year</th>
					<th>Department Code</th>
					
				</thead>
				<tbody>
					<tr>
						<TD><INPUT type="checkbox" name="chk"/></TD>
						<TD><INPUT type="text" name="txt"/></TD>
						<TD><INPUT type="text" name="txt"/></TD>
						<TD><INPUT type="text" name="txt"/></TD>
						<TD><INPUT type="text" name="txt"/></TD>
					</tr>
				</tbody>
				<INPUT type="button" value="Save" onclick="saveValues('subjectTable')" />
			</table>
		</div>
	</div>
	<div id="View_subjects" style="display:none;">
		<div id="tableSub">
			<table id="subjectTable" border="1" >
				<thead>
					<th>Subject Name</th>
					<th>Subject Information</th>
					<th>Year</th>
					<th>Department Code</th>
					
				</thead>
				<tbody>
				<?php
					$subjectInfo = $subject->find();
					foreach($subjectInfo as $obj){
						echo '<tr>';
						echo '<td>'.$obj["subjectName"].'</td>';
						echo '<td>'.$obj["subjectInfo"].'</td>';
						echo '<td>'.$obj["year"].'</td>';
						echo '<td>'.$obj["branchCode"].'</td>';
						//echo '<td><button class="btn" onclick="">edit</button></td>';
						//echo '<td><button class="btn" onclick="">Update</button></td>';
						echo '</tr>';
					}
				?>
				</tbody>
			<table>
		</div>
	</div>
	</div>
</body>
</html>