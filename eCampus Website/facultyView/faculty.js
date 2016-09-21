       
        function generateSections()
        {
            var Count = $("#SecCount").val();
            $.ajax({
                type: "GET",
                url:"generateSections.php",
                data: {count: Count},
                dataType: "html",
                success:function(html){
                    $("#sectionsDiv").html(html);
                },
                 error:function(html){
                    $("#sectionsDiv").html(html);
                }
            });
        }
			
	/*		function changeSections(ajax_page) {
			$.ajax({
				type: "GET",
				url: "http://localhost:8080/eCampus/faculty/"+ajax_page,
				data: "ch=" + $("#section_count").val(),
				dataType: "html", 
				success: function(html){    
				   $("#sec").html(html);     }
				}); 
		}
		*/
    
	
		
