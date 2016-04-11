$(function()
{
    $("#dialog").dialog({
		autoOpen: false,
		modal: true,
		buttons: [
			{
				text: raito_teema.langs.delete,
				click: function() {
					
					var a = $("#dialog").data('delete_url');			
					window.location = a;
				}
			},
			{
				text: raito_teema.langs.cancel,
				click: function() {
					$(this).dialog("close");
				}
			}
		]});
});
  
function test(delete_item_url)
{
	$('#dialog').data('delete_url', delete_item_url); //assign the ID for later use	
	$("#dialog").dialog('open');		
}	