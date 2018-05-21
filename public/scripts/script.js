$(document).ready(function (){

	$("#menu").click(function (){
		$(".menu-area").toggleClass("menu-active");
		$("#menu").toggleClass("menu close-menu");
	});

	$(".close-menu").click(function (){
		$(".menu-area").toggleClass("menu-active");
		$(".close-menu").toggleClass("menu close-menu");
	});

	$("#open_register").click(function (){
		$("#register").fadeIn(300, "swing");
		$("#login").fadeOut(200, "swing");
		$(this).addClass("filter-grey");
	});

	$("#open_login").click(function (){
		$("#register").fadeOut(200, "swing");
		$("#login").fadeIn(300, "swing");
		$(this).addClass("filter-grey");
	});

	$(".id-exit-form").click(function (){
		$(this).parent().parent().fadeOut(300, "swing");
		$("#open_register").removeClass("filter-grey");
		$("#open_login").removeClass("filter-grey");
	});

	$(".userInput").focus(function (){
		$(this).parent().addClass("focus");
	}).blur(function (){
		if($(this).val() === ''){
			$(this).parent().removeClass("focus");
		}
	});


	$(".btn-card-exit").click(function (){
		$(this).parent().animate({
			opacity: 0,
		}, 310, "swing", function (){
			$(this).toggle();
		});
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