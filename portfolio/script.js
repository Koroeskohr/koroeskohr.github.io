$(document).ready(function() {
	$(window).resize(function(){
		$("header, section").height($(window).innerHeight());
	})
	.trigger('resize');

	
});
