
$(".btn-card-delete").click(function (event){
	$(this).parent().parent().animate({
		opacity: 0,
	}, 310, "swing", function (){
		$(this).slideUp("slow");
	});
});

$(".post-open").click(function(){
	$(this).parent().children(".in-post-text").slideToggle();
});

$(".add-post-button").click(function() {
	$(".add-post-form").slideToggle("slow");
});