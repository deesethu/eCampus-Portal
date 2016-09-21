function ShowTestPattern(subjectId)
	{
		 window.location.href = "TestWelcomePage.php?sub="+ subjectId;
	}
	
function analyzeTest(){
	
	var testId = $("#testList").val();
	window.location.href = "getDataToAnalyzeTest.php?testId="+ testId;
}