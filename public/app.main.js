$(document).ready(function(){
	initRemoteModals();
	initTypeAhead();
    initContactFields();
})

function initContactFields()
{
    // adding a fields
    $("body").on("click", "a#add-fields", function(e) {
        e.preventDefault();
        var _skeleton = $("#skeleton").clone().attr('id', '').removeClass('hidden');
        $("div#custom-fields").append(_skeleton);
        checkNbFields();
    });
    // removing a field
    $("body").on("click", ".remove-field", function(e) {
        $(this).closest('div').remove();
         checkNbFields();
    });
}

/*
 * Toggles the add field link when count reaches 5.
 */
function  checkNbFields()
{
    if($("div#custom-fields div").length >= 5)
        $("#add-fields").hide();
    else
        $("#add-fields").show()
}

/*
 * Callback function for some modals: add/edit contact
 * Clears the modal body, displays a success message and reloads contacts list.
 */
function displaySuccessMessage(data, form)
{
	$("#bootstrap-modal .modal-body").html("").html(data.message);
	$.ajax({
        method: 'GET',
        url: '/contacts/reload',
        success: function(data){
        	$(".contact-list").html(data);
        }
    });
}

/*
 * Callback function for delete contact.
 * Removes the row from the table.
 */
function removeRow(data, form)
{
	$(form).closest('tr').fadeOut();
}