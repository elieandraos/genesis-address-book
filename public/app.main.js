/*
 * Clear the modal body, a success message and reload contacts list.
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

function removeRow(data, form)
{
	$(form).closest('tr').fadeOut();
}