<div class="container">
	<!-- About market -->
	<div class="tab-content z-depth-1 full">
		<span class="h3">Hello user!</span>
		<span class="h2"><?=$name?></span>
		<span class="h4">
			<?php $this->ifempty($information, $empty_inform, true);?>
		</span>
		<div class="h4">
			<?php $this->ifempty($category, $empty_category, true);?>
		</div>
	</div>

	<div class="tab-content z-depth-1 full">
		<div class="h4">Ваш магазин пока не опубликован, что бы его могли видеть другие, нужно выполнить 4 простых шага.</div>
		<div class="members -tasks">
			<div class="-task z-depth-1 hoverable"><a href="/members/edit/products/">Добавьте товар</a></div>
			<div class="-task z-depth-1 hoverable"><a href="#">Настройте дизайн</a></div>
			<div class="-task z-depth-1 hoverable"><a href="#">Заполните информацию о себе</a></div>
			<div class="-task z-depth-1 hoverable"><a href="#">Далеко-далеко за словесными</a></div>
		</div>
	</div>
</div>

<script src="/scripts/script.js"></script>
<script src="/scripts/ripple.js"></script>
