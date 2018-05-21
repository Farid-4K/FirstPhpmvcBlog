
<div class="container margin">
<div class="add-post-button h4 z-depth-2 hoverable">добавить</div>
	<div class="fixed-add add-post-form">
		<div class="-new-post animation tab-content z-depth-3">
			<form enctype="multipart/form-data" action="/members/edit/" method="post">
				<div class="h2">Добавить пост</div>
				<div class="name"><input name="name" placeholder="Название" type="text"></div>
				<div class="inform">
					<textarea class="text-area-y" placeholder="Информация" name="inform"></textarea>
				</div>
				<div class="buttons">
					<div class="file"><label class="z-depth-1" for="file">Добавить фото</label></div>
					<input name="file" type="file" id="file">
					<button data-ripple-color="#fff" class="z-depth-1 material-ripple" name="create" type="submit">Создать</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
			<div class="lg-12 md-12 xs-12 xm-12">
				<?php foreach ($list as $key => $value): ?>
					<div class="tab-content no-padding product z-depth-2 full">
						<form verify="true" action="/members/edit/" method="post">
							<input name="id" type="text" value="<?=$value['id'];?>" style="display: none">
							<button class="btn-card-delete delete-post" type="submit" name="delete"></button>
						</form>
						<?php if (!empty($value['image'])): ?>
							<div class="img post-open" style="background:url(<?=$value['image'];?>) no-repeat center center"></div>
							<?php else: ?>
								<div class="h3 post-open tab-in">Нет фото</div>
							<?php endif;?>
							<div class="in-post-text tab-in">
								<div class="close-in-post-text"></div>
								<div class="h2 -title"><?=$value['name'];?></div>
								<div class="h3 -inform"><?=$this->textParsePost($value['inform']);?></div>
								<div class="h5">Номер поста: <?=$value['id'];?></div>
							</div>
						</div>
					<?php endforeach;?>
				</div>

			</div>
		</div>
		<div id="notification"></div>

		<script src="/public/scripts/blog.js"></script>
		<script src="/public/scripts/form.js"></script>
		<script src="/public/scripts/script.js"></script>
		<script src="/public/scripts/ripple.js"></script>