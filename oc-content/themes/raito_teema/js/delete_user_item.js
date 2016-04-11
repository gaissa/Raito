//Shows delete user item dialog
function delete_user_item(userItemData) {

    $('<div id="dialogs" title="' + userItemData[1] + '">' + userItemData[2] + '</div>').dialog({         
		modal: true,
		buttons: [
			{
				text: raito_teema.langs.delete,
				click: function() {					
					window.location = userItemData[0];
				}
			},
			{
				text: raito_teema.langs.cancel,
				click: function() {					
					$(this).dialog("close");
				}
			}
		]
    });
}