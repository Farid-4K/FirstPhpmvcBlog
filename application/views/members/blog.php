<div class="container">

	<div class="row">
		<!-- About market -->
		<div class="lg-12">
			<div class="tab-content z-depth-1 full">
				<div class="h3">Hello user!</div>
				<div class="h2"><?=$name;?></div>
				<div class="hr"></div>
				<div class="h4">
					<?php $this->ifempty($information, $empty_inform, true);?>
				</div>
				<div class="h4">
					<?php $this->ifempty($category, $empty_category, true);?>
				</div>
			</div>
		</div>

		<?php if (@$_SESSION['emailVerify'] == true): ?>
			<div class="lg-12">
				<div class="tab-content z-depth-1 full">
					<div class="h2">Почта подтверждена</div>
				</div>
			</div>
		<?php endif;?>

		<div class="lg-6 h-6">
			<div class="tab-content full z-depth-1">
				<div class="flex-center">
					<div class="full">
						<div id="email" class="-task z-depth-1 hoverable"><a href="#">Подтвердите E-mail</a></div>
					</div>
				</div>
			</div>
			<div class="tab-content full z-depth-1">
				<div class="flex-center">
					<a class="h2 a" href="/members/edit/">Добавить пост</a>
				</div>
			</div>
		</div>

		<div class="lg-6 h-3">
			<div class="tab-content z-depth-1 full">
				<div class="h3 no-margin">Текст постов поддерживает форматирование</div>
				<div>
					<ul>
						<li><div class="h4"><i>*курсив*</i></div></li>
						<li><div class="h4"><b>**жирный**</b></div></li>
						<li><div class="h4"><tt>***моноширный***</tt></div></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div style="opacity: 0;display: none" class="ajaxpreview">
	<div class="btn-card-exit"></div>
	<div class="ajaxpreview-content z-depth-5"><br>
		<?php if ($email_check): ?>
			<div class="h4">На вашу почту отправлено письмо с подтверждением, перейдите по ссылке в письме для того что бы подтвердить свой аккаунт</div>
			<?php else: ?>
				<div class="h2">Почта подтверждена</div>
			<?php endif;?>
		</div>
	</div>



	<script>
		$("#email").click(function (){
			$(".ajaxpreview").show().animate({opacity:1},310,"swing");
		});
	</script>
	<script src="/public/scripts/script.js"></script>
	<script src="/public/scripts/ripple.js"></script>
