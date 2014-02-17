
var testswipe = $("#testswipe").hammer();

testswipe.on("swiperight",menuIn);


function menuIn(){
	console.log("swipedlol");
	$("#menul").animate({
		"margin-left": 0},
		400, function() {
		/* stuff to do after animation is complete */
		testswipe.off("swiperight",menuIn);
		testswipe.on("swipeleft",menuOut);

	});
}

function menuOut(){
	$("#menul").animate({
		"margin-left": "-15%"},
		400, function() {
		/* stuff to do after animation is complete */
		testswipe.off("swipeleft",menuOut);
		testswipe.on("swiperight",menuIn);

	});
}