			
		function getValues(tableID){
			var table = document.getElementById(tableID);
			var values=new Array();			
			for (var r = 1, n = table.rows.length; r < n; r++) {
				for (var c = 1, m = table.rows[r].cells.length; c < m; c++) {
					values[((r-1)*(m-1))+(c-1)] = table.rows[r].cells[c].childNodes[0].value;
				}
			}
			/*for(var i=0;i<values.length;i++){
				document.write("<b>values["+i+"] is </b>=>"+values[i]+"<br>");
			}*/
			/*$.ajax({
				type: "POST",
				url: dbStore.php,
				data[]: values,
				dataType: "html", 
				success: function(html){    
				   $("#Year").html(html);     }
				});*/ 
		
			$.post('dbStore.php', { 
				'values[]': values 
			},function(data) {
				alert(data);
			});
		}
		
		function saveValues(tableID){
			var table = document.getElementById(tableID);
			var values=new Array();			
			for (var r = 1, n = table.rows.length; r < n; r++) {
				for (var c = 1, m = table.rows[r].cells.length; c < m; c++) {
					values[((r-1)*(m-1))+(c-1)] = table.rows[r].cells[c].childNodes[0].value;
				}
			}
			/*for(var i=0;i<values.length;i++){
				document.write("<b>values["+i+"] is </b>=>"+values[i]+"<br>");
			}*/
			/*$.ajax({
				type: "POST",
				url: dbStore.php,
				data[]: values,
				dataType: "html", 
				success: function(html){    
				   $("#Year").html(html);     }
				});*/ 
		
			$.post('subjectStore.php', { 
				'values[]': values 
			},function(data) {
				alert(data);
			});
		}
		
		
		
		
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
		
		
		/*
function edit(branchCode){
	$.post('edit.php',bCode:branchCode,function(data){
	document.write('<input type="text">'data'</input>');
	});
	}
*/
