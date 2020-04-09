jQuery(document).ready(function() {

	if(jQuery("body").hasClass("page-template-fireplacespagetemplate")) {
		jQuery('.fps-expand-button').on('click', function() {
			jQuery(this).parents('.fireplace-objects').toggleClass('fireplace-objects-toggle-class');
			jQuery(this).find('.fps-menu-button').toggleClass("fa-chevron-down").toggleClass("fa-chevron-up");
			jQuery(this).toggleClass("fps-more-button-down").toggleClass("fps-more-button-up");
		});
		// page specific code here
	}
});

