$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$(function () {
  $('[data-toggle="popover"]').popover()
})

function deleterow(element){
	 $(element).closest('tr').remove();
}
