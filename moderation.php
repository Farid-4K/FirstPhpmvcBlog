<?php
require "db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/custom.bootstrap.grid.css">
	<meta charset="UTF-8">
	<title>moderation site</title>
</head>
<body>
	<h3>Страница модератора</h3><br>
	<div class="post">
		<form method="POST">
			<?php
				echo '<button name="download_products">Загрузить продукт</button><br>';
				if (isset($_POST['download_products'])){
					$product_public = R::getrow( 'SELECT * FROM products WHERE publicate LIKE ? LIMIT 1', ['0']);
					var_dump($product_public);
					echo '<br><button name="done">Разрешить к публикации</button>
					<div class="post moderation-post">
						<h3>'. $product_public['name']  .'<h3><br>
						<h3>'. $product_public['id']  .'<h3><br>
						<p>'. $product_public['discribe'] .'</p><br>
						<h4>'. $product_public['clock'] .'</h4><br>
						<h4>'. $product_public['author'] .'</h4><br>
						<h3>Разрешение (0 - нет, 1 - да): '. $product_public['publicate'] .'</h3>
						<img src="'.$product_public['img_url'].'" alt="POSTER">
					</div>';
				}
				if (isset($_POST['done'])){
					$product_public = R::getrow( 'SELECT * FROM products WHERE publicate LIKE ? LIMIT 1', ['0']);
					$idpublicate = R::loadForUpdate('products',$product_public['id']);
					$idpublicate -> publicate = '1'; R::store($idpublicate);
					var_dump($idpublicate);
				}
			?>
		</form>
	</div>
</body>
</html>