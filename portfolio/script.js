$(document).ready(function() {
	$(window).resize(function(){
		$("header, section").height($(window).height());
	})
	.trigger('resize');




});
