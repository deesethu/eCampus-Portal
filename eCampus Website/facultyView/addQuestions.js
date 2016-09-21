function AddMoreOptions()
{
    var count = $("#OptionsTable tr").length +1;
    $("#OptionsTable").append("<tr id='OptionTr"+count+"'><td>"+count+".</td><td><input type='text' id='Option"+count+"' name='Option"+count+"' value=''/></td></tr>");
    $("#OptionCount").val(count);
}

function RemoveOptions()
{
    var count = $("#OptionsTable tr").length;
    if(count>1)
    $("#OptionTr"+count).remove();
    $("#OptionCount").val(count-1);
}
function Clear()
{
    window.location.reload();
}