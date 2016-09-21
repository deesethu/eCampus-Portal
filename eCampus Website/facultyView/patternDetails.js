function showPatternDetails(patternid)
	{
		$.ajax({
			type: "GET",
			url: "getPatternContent.php",
			data: 'ch='+patternid,
			dataType: "html", 
			success: function(html){    
			   $("#ViewPatternContentDiv").empty();
				$("#ViewPatternContentDiv").append(html);
			},
			error: function(html){    
			   
			   $("#ViewPatternContentDiv").empty();
				$("#ViewPatternContentDiv").append(html);
				}
			}); 
	}