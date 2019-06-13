jQuery(document).ready(function() {

/* Banner class */
	jQuery('.squarebanner ul li:nth-child(even)').addClass('rbanner');
	jQuery('ul#shelf li:nth-child(4n)').addClass('lastbox');
	jQuery('ul#shelf li:nth-child(4n)').after('<div class="clear"></div>');

/* Navigation */
	jQuery('#submenu ul.sfmenu').superfish({ 
		delay:       500,								// 0.1 second delay on mouseout 
		animation:   {opacity:'show',height:'show'},	// fade-in and slide-down animation 
		dropShadows: true								// disable drop shadows 
	});	


/* Slider */	
	
	jQuery('.flexslider').flexslider({
		controlNav: true,
		directionNav: false  
		});	
		

/* Fancy that	 */
	jQuery(".propic").fancybox({
		'titleShow' : false,
		'transitionIn' : 'elastic',
		'transitionOut' : 'elastic',
		'easingIn' : 'easeOutBack',
		'easingOut' : 'easeInBack'
	}); 
	
});

