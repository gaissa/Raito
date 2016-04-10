$(document).ready(function(){
    $(".opt_delete_account a").click(function(){
        $("#dialog-delete-account").dialog('open');
    });

    $("#dialog-delete-account").dialog({
        autoOpen: false,
        modal: true,
        buttons: [
            {
                text: raito_teema.langs.delete,
                click: function() {
                    window.location = raito_teema.base_url + '?page=user&action=delete&id=' + raito_teema.user.id  + '&secret=' + raito_teema.user.secret;
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
});