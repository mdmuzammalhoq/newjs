$(document).ready(function(){
	$('.project_list').mixItUp();
	$(".featured_product_lists").owlCarousel({
		autoPlay: 3000, //Set AutoPlay to 3 seconds
		navigation:true,
		pagination:false,
		items : 4,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,3]
	});
	$('.slider').fractionSlider({
		'fullWidth': 			true,
		'controls': 			true, 
		'pager': 				true,
		'responsive': 			true,
		'dimensions': 			"1000,400",
	    'increase': 			false,
		'pauseOnHover': 		true,
		'slideEndAnimation': 	true
	});
	$('body').scrollToTop({skin: 'cycle'});
});