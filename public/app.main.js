$(document).ready(function(){
	initRemoteModals();
	initTypeAhead();
})

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