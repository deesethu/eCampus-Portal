function activePatternChanged(patternid)
{
	$.ajax({
			type: "GET",
			url: "changeActivePattern.php",
			data: 'ch='+patternid,
			dataType: "html", 
			success: function(data){    
				alert(data);
			},
			error: function(html){    
			   alert("Failed to change active pattern");
				}
			}); 
}
