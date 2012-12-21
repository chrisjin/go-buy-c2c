jQuery(document).ready(function() {	

	jQuery("#cate-nav li").hover(function(){ 
			jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).show(); 
			jQuery(this).find('ul:first').parent().addClass("expanded");
		},function(){ 
			jQuery(this).find('ul:first').css({visibility: "hidden"}); 
			jQuery(this).find('ul:first').parent().removeClass("expanded");
		}); 

});

