$(function(){

	//after a while wack of tries this is what I came up with! It is very weird, and I don't know why the images jump two spots, but we'll cal it a feature:)

	$('#next').on('click',function(e){
		e.preventDefault();
		// console.log('yeppers');
		// $('.gallery-item').first().addClass('none');
		$('.gallery-container ul li:last-child').prependTo('.gallery-container ul');
	});

	$('#prev').on('click',function(e){
		e.preventDefault();
		$('.gallery-container ul li:first-child').appendTo('.gallery-container ul');
	});

});