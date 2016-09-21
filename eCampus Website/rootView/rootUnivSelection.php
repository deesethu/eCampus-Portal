<?php

include("mongoConfig.php");

$mdb=mongoConnect();

$universities = $mdb->selectCollection('universities');
$subjects = $mdb->selectCollection('subjects');
$colleges = $mdb->selectCollection('colleges');	
						
							
?>
<html>
	<head>
		<title>eCampus Portal</title>
		<link href="themes/assets/css/bootstrap.css" rel="stylesheet">
		<link href="themes/assets/css/bootstrap-responsive.css" rel="stylesheet">
		<link href="themes/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
	
		<link rel="shortcut icon" href="themes/assets/ico/favicon.ico">
		<link rel="apple-touch-icon" href="themes/assets/ico/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="themes/assets/ico/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="themes/assets/ico/apple-touch-icon-114x114.png">
		<script src="jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>
		<script src="jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.js"></script>
		<script src="jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
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
			<script>
			function changeCollege(ajax_page,uid) {
				$.ajax({
					type: "GET",
					url: ajax_page,
					data: "ch="+uid ,
					dataType: "html", 
					success: function(html){    
					   $("#colgid").html(html);     }
					}); 
				}
				
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
			<script>
		
		
		function getValues(tableID){
			var table = document.getElementById(tableID);
			var values=new Array();			
			for (var r = 1, n = table.rows.length; r < n; r++) {
				for (var c = 1, m = table.rows[r].cells.length; c < m; c++) {
					values[((r-1)*(m-1))+(c-1)]=table.rows[r].cells[c].childNodes[0].value;
				}
			}
			for(var i=0;i<values.length;i++){
				document.write("<b>values["+i+"] is </b>=>"+values[i]+"<br>");
			}
			/*$.post( 'dbStore.php', { 
				'data[]': values 
			});*/
		}
		</script>
			

	</head>
	<body style="margin-top:10%;">
		<center>
		
			<div class="span4">	
			
					<select multiple name="universityName" id="universityName" value="" onChange='changeCollege("generateCollege.php",this.value);'>
						
							<?php
								$cursor = $universities->find();
								foreach($cursor as $obj)
								{
									echo '<option value="'.$obj["uid"].'">'.$obj["universityName"].'</option>';
								}
							?>
					</select>
			</div>
							
					
		
				       
				</div>
				<div id="colgid" class="span4 offset5">	
				<select multiple name="collegeName" id="collegeName" value="">
							<?php
								$cursor1 = $colleges->find();
								foreach($cursor1 as $obj)
								{
									echo '<option value="'.$obj["cid"].'">'.$obj["collegeName"].'</option>';
								}
							?>
					</select>
					</div>
				
				<div class="control-group">
					<div class="controls">
						<button class="btn" onclick="showdiv('subject_list')">Next</button>
					</div>
				</div>
				<br><br><br><br>
				<div id="subject_list" style="display:none;">		
					<div id="tablediv">
						<INPUT type="button" value="Add Row" onclick="addRow('dataTable')" />
						<INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" />
						<table id="dataTable" border="1">
							<thead>
							<th></th>
								<th>Subject</th>
								<th>Subject Code</th>
								<th>Information</th>
								<th>Branch</th>
								
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
						<INPUT type="button" value="Store in database" onclick="getValues('dataTable')" />
		</table>
					</div>
					
					
					
					
					
				
				</div>
		
		</center>
			
			<?php			
				$cursor1 = $subjects->find();
				foreach($cursor1 as $obj)
				{
					$array[]=$obj["subjectName"];
					
				}
				?>
			<script>
			
			function addRow(tableID) {
 
            var table = document.getElementById(tableID);
		
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
			
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
			
			//alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    
                }
								
            }
				
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 2) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }
			catch(e) {
                alert(e);
            }
        }
		</script>

	</body>
</html>