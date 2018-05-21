<div class="container margin">
	<div class="row">
		<div class="lg-l-1 md-l-1 xs-12">
			<div class="fixed-add">
				<div class="-new-post tab-content z-depth-1">
					<form enctype="multipart/form-data" action="/members/edit/products/" method="post">
						<div class="h2">Добавить товар</div>
						<div class="name"><input name="name" placeholder="Название" type="text"></div>
						<div class="inform"><textarea placeholder="Информация" name="inform"></textarea></div>
						<div class="buttons">
							<div class="file"><label class="z-depth-1" for="file">Добавить фото</label></div>
							<input name="file" type="file" id="file">
							<button data-ripple-color="#fff" class="z-depth-1 material-ripple" name="create" type="submit">Создать</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="lg-m-5 md-m-5 sm-m-5 lg-7 md-7 sm-7 xs-12">
			<?php foreach ($list as $key => $value): ?>
				<div class="tab-content product z-depth-1 full">
					<?php if(!empty($value['image'])): ?>
						<div class="img" style="background:url(/<?= $value['image'];?>) no-repeat center center"></div>
						<?php else: ?>
							<div class="h3">Нет фото</div><hr>
						<?php endif; ?>
						<div class="h3"><?= $value['name']; ?></div>
						<div class="h3"><?= $value['inform']; ?></div>
						<div class="h5">Номер товара: <?= $value['id']; ?></div>
					</div>
				<?php endforeach; ?>
			</div>

		</div>

		<div id="notification"></div>
	</div>

	<script src="/public/scripts/form.js"></script>
	<script src="/public/scripts/script.js"></script>
	<script src="/public/scripts/ripple.js"></script>