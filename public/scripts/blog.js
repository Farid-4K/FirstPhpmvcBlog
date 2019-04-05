$(".btn-post-delete").click(function (){
	$(this).parents('.tab-content').animate({
		opacity: 0,
	}, 100, "swing", function (){
		$(this).slideUp("slow");
	});
});

$(".post-open").click(function(){
	$(this).parent().children(".in-post-text").slideToggle(220);
});

$(".add-post-button").click(function() {
	$(".addpostform").toggleClass("toggle-left");
});

$(".btn-post-edit").click(function() {
	$(".editpostform").toggleClass("toggle-left");
	var id = $(".btn-post-edit").parent().children('input[name=postID]').attr("value");
	$("input[name=editID]").attr("value", id);
});

$(".btn-form-exit").click(function(){
	$(".editpostform").toggleClass("toggle-left");
});
