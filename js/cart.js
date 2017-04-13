$(document).ready(function() {
	$('.addCart').on('click', function(){
		var url = window.location.href;  
		var id = $(this).attr('value');
		$(this).attr('href', function() {
			return "checkout.php?acao=add&id="+id+"&qntd=" +  $('select').val();
		});
	});

	$('.up').on('click', function(){
		var val = $(this).siblings('input').val();
		var href = $(this).attr('href');
		$(this).attr({
			'href': href + val
		});
	});
})