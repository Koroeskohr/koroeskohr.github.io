$(document).ready(function() {
	$(window).resize(function(){
		$("header, section").height($(window).height());
		$("header>div>img").height($(window).height()/2.5);
	})
	.trigger('resize');



});
