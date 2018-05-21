<!-- ==== MARKETS ==== -->
<div class="container">

	<div class="tab-grid-market">
		<div class="area-top tab-content z-depth-1 full"><span class="h1">Golden Hands rev.00.2.07</span></div>
		<?php $market = R::getAll("SELECT * FROM markets");?>
		<?php foreach ($market as $key => $value):?>
			<?php $ead = json_decode($value['img_url']); ?>
			<div id="<?=$value['id']?>" class="tab-content-market z-depth-2">
				<div class="img" style="background: url(<?= $ead -> img_post ?>) no-repeat center center;"></div>
				<div class="info"><span class="h2"><?= $value['name']; ?></span></div>
			</div>
		<?php endforeach; ?>
	</div>
	
</div>

<div style="opacity: 0" class="ajaxpreview">
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
				$(".ajaxpreview").css("display","block");
				$(".ajaxpreview").css("z-index", "95").animate({
					opacity: 1,
				}, 310, "swing");
			}
		});
	});

</script>
<script src="/public/scripts/script.js"></script>
<script src="/public/scripts/ripple.js"></script>
<script src="/public/scripts/form.js"></script>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>