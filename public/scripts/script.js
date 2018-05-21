$(document).ready(function (){

	$("#menu").click(function (){
		$(".menu-area").toggleClass("menu-active");
		$("#menu").toggleClass("menu close-menu");
	});

	$(".close-menu").click(function (){
		$(".menu-area").toggleClass("menu-active");
		$(".close-menu").toggleClass("menu close-menu");
	});

	$(".userInput").focus(function (){
		$(this).parent().addClass("focus");
	}).blur(function (){
		if($(this).val() === ''){
			$(this).parent().removeClass("focus");
		}
	});

	$(".btn-card-exit").click(function (){
		$(this).parent().fadeOut();
	});

	$(".notification").click(function (){
		$(this).fadeOut(400,"swing");
	});

	$(window).scroll(function() {
		if ($(this).scrollTop() > 100) {
			$("#header").fadeOut(330, "swing");
		};

		if ($(this).scrollTop() < 90) {
			$("#header").fadeIn(450, "swing");
		};
	});
});