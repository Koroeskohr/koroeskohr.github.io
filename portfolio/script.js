$(document).ready(function() {
	$(window).resize(function(){
		$("header, section").height($(window).innerHeight());
		$("header>div>img").height($(window).innerHeight()/2.5);
	})
	.trigger('resize');



});
