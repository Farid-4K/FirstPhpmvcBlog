<div class="container">
	<!-- About market -->
	<div class="tab-content z-depth-1 full">
		<div class="h3">Hello user!</div>
		<div class="h2"><?=$name;?></div>
		<div class="h4">
			<?php $this->ifempty($information, $empty_inform, true);?>
		</div>
		<div class="h4">
			<?php $this->ifempty($category, $empty_category, true);?>
		</div>
	</div>

	<?php if (@$_SESSION['emailVerify'] == true): ?>
		<div class="tab-content z-depth-1 full">
			<div class="h2">Почта подтверждена</div>
		</div>
	<?php endif;?>

	<div class="tab-content z-depth-1 full">
		<div class="h4">Ваш блог пока не опубликован, что бы его могли видеть другие, нужно выполнить 4 простых шага.</div>
		<div class="members -tasks">
			<div class="-task z-depth-1 hoverable"><a href="/members/edit/products/">Lorem ipsum dolor.</a></div>
			<div class="-task z-depth-1 hoverable"><a href="#">Lorem ipsum dolor.</a></div>
			<div id="email" class="-task z-depth-1 hoverable"><a href="#">Подтвердите E-mail</a></div>
			<div class="-task z-depth-1 hoverable"><a href="#">Lorem ipsum dolor.</a></div>
		</div>
	</div>
</div>

<div style="opacity: 0;display: none" class="ajaxpreview">
	<div class="btn-card-exit"></div>
	<div class="ajaxpreview-content z-depth-5"><br>
		<?php if (@$email_check == false): ?>
			<div class="h4">На вашу почту отправлено письмо с подтверждением, перейдите по ссылке в письме для того что бы подтвердить свой аккаунт</div>
			<?php else: ?>
				<div class="h4">Почта подтверждена</div>
		<?php endif;?>
	</div>
</div>
<script>
	$("#email").click(function (){
		$(".ajaxpreview").show().animate({opacity:1},310,"swing");
		/*
		var id = $(this).attr("id");
		$.ajax({
			type: "POST",
			url: "/ajaxpreviewpost",
			data: 'token='+id,
			cache: true,
			success: function(result) {
				$(".ajaxpreview-content").html(result);
				$(".ajaxpreview").fadeIn("slow").css("opacity","1");
			}
		});
		*/
	});
</script>
<script src="/public/scripts/script.js"></script>
<script src="/public/scripts/ripple.js"></script>