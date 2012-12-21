jQuery(document).ready(function() {

	/* tabs */	
	jQuery('#tabs .tab-content').hide(); 
	jQuery('#tabs .tab-content:first').show(); 
	jQuery('#tabs .tab li:first').addClass('active'); 
	jQuery('#tabs .tab li a').click(function(){ 
		jQuery('#tabs .tab li').removeClass('active'); 
		jQuery(this).parent().addClass('active'); 
		var currentTab = jQuery(this).attr('href'); 
		jQuery('#tabs .tab-content').hide(); 
		jQuery(currentTab).show(); 
		return false;
	});
	
	
});