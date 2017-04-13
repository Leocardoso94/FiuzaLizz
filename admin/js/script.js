$('.dropdown-toggle').click(function(e) {
	e.preventDefault();
	e.stopPropagation();

	return false;
});
$('.dropdown-menu').click(function(e) {
	e.preventDefault();
	e.stopPropagation();

	return false;
});
$(document).ready(function () {
	$('.dropdown-toggle').dropdown();
	
	$( ".del" ).on( "click", function(){
	var lastClass = $(this).attr('class').split(' ').pop();
	$("#whoDel").val(lastClass);
	});



}); 

