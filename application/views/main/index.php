<div id="notification"></div>
<div id="loader" style="display: none"></div>
<!-- ==== MARKETS ==== -->

<div class="container">

	<div class="tab-grid-market">
		<div class="area-top tab-content z-depth-1 full"><span class="h1">Blog rev.00.2.07</span></div>
		<?php $blog = R::getAll("SELECT * FROM posts");?>
		<?php foreach ($blog as $key => $value): ?>
			<div id="<?=$value['id'];?>" class="tab-content-market z-depth-2">
				<div class="img" style="background: url(<?=$value['image'];?>) no-repeat center center;"></div>
				<div class="info"><span class="h2"><?=$value['name'];?></span></div>
			</div>
		<?php endforeach;?>
	</div>

</div>

<div style="display: none;" class="ajaxpreview">
	<div class="btn-card-exit"></div>
	<div class="ajaxpreview-content z-depth-5">
	</div>
</div>

<script>

	$(".tab-content-market").click(function (){
		var id = $(this).attr("id");
		var currentCard = $(this);
		$.ajax({
			type: "POST",
			url: "/ajaxpreviewpost",
			data: 'card='+id,
			cache: true,
			success: function(result) {
				$(".ajaxpreview-content").html(result);
				$(".ajaxpreview").fadeIn("slow");
			}
		});
	});

</script>
<script src="/public/scripts/script.js"></script>
<script src="/public/scripts/ripple.js"></script>
<script src="/public/scripts/form.js"></script>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>