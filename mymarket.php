<?php
require "db.php";
if (isset($_SESSION['logged_user'])){
if (isset($_POST['go'])){
		$fileURL = 'basename';
		if ($_FILES['picture']['type'] == 'image/jpeg'){
			$filenameFirst = $_FILES['picture']['name'];
			echo $filenameFirst;
			$uploaddir = 'img/files/';
			$uploadfile = $uploaddir . substr(md5(date('d.m.Y H:i:s')),1,7) . substr(md5(basename($_FILES['picture']['name'])),1,10) . '.jpg';
			if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile)) {
	   		echo "Файл корректен и был успешно загружен.\n";
	   		$fileURL = $uploadfile; 
			}else{echo "Небезопасно загружать файл\n";}
			echo 'Информация о файле: <pre>';
			print_r($_FILES);
			echo '</pre>';
		}else{
			echo 'Можно только JPEG';
		}
		$product_data = R::dispense('products');
		$product_data -> name = $_POST['product'];
		$product_data -> discribe = $_POST['discription'];
		$product_data -> clock = date('d.m.Y H:i:s');
		$product_data -> imgURL = $fileURL;
		$product_data -> author = $_SESSION['logged_user'] -> email;
		$product_data -> publicate = false;
		R::store($product_data);
		echo 'Товар добавлен, ожидайте разрешения модератора на публикацию.';
	}
}
else{
	echo '<h3>Вы не авторизированы, <a href="newmarket.php">Авторизоваться</a></h3>';
}
/* отладочная инфорамция */
var_dump($_SESSION['logged_user']);
$products_on_mymarket = R::getrow( 'SELECT * FROM products WHERE author LIKE ?', [$_SESSION['logged_user'] -> email]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/custom.bootstrap.grid.css">
	<meta charset="UTF-8">
	<title>Публикация</title>
</head>
<body>
	<h2>Тут вы можете опубликовать товар</h2>
	<div class="post">
		<form enctype="multipart/form-data" method="POST">
			<input type="text" placeholder="Название товара" name="product">
			<textarea placeholder="Описание товара" name="discription"></textarea>
			<input type="file" name="picture">
			<input type="submit" name="go">
		</form>
	</div>
	<div class="post">
		<?php
		$products_on_mymarket = R::getrow( 'SELECT * FROM products WHERE author LIKE ?', [$_SESSION['logged_user'] -> email]);
		if ($products_on_mymarket['publicate'] == '1'){
		echo '
		<div class="post moderation-post">
			<h3>'. $products_on_mymarket['name']  .'<h3><br>
			<h3>Номер продукта: '. $products_on_mymarket['id']  .'<h3><br>
			<p>'. $products_on_mymarket['discribe'] .'</p><br>
			<h4>'. $products_on_mymarket['clock'] .'</h4><br>
			<h4>'. $products_on_mymarket['author'] .'</h4><br>
			<h3>Разрешение (0 - нет, 1 - да): '. $products_on_mymarket['publicate'] .'</h3>
			<img src="'.$products_on_mymarket['img_url'].'" alt="POSTER">
		</div>';}
		$author = $_SESSION['logged_user'] -> email;
		$author_products = R::find('products', 'publicate LIKE ?', ['1']);
			echo '<pre>'.var_dump($author).'<br>';
			print_r($author_products);
			print_r($author_products['id']);
			echo '</pre>';
		?>
	</div>
</body>
</html>





















<!-- <html>
<head>
	<title>Document</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/custom.bootstrap.grid.css">
</head>
<body>
<div class="header">
	<div class="row">
		<div class="search">
			<div class="input-new-market col-lg-1"></div>
			<div class="input-new-market col-lg-1"></div>
			<div class="search-bar col-lg-8"></div>
			<div class="input-new-market col-lg-1"></div>
			<div class="input-new-market col-lg-1"></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-1"></div>
	<div class="contain center__box lg-col-10">
		<div class="row">
			<div class="www-inform col-lg-12"><h1>Вы создали магазин!<br>Выполните 4 простых шага для его публикации</h1></div>
			<div class="col-lg-12">
				<div class="www-inform preview">
					<div class="post col-lg-3">
						<div class="picture"><h2>Заполните информацию о себе</h2></div>
					</div>
					<div class="post col-lg-3">
						<div class="picture"><h2>Опубликуйте товар</h2></div>
					</div>
					<div class="post col-lg-3">
						<div class="picture"><h2>АБВ</h2></div>
					</div>
					<div class="post col-lg-3">
						<div class="picture"><h2>АБВ</h2></div>
					</div>
				</div>
<br><br><br><br>
				<div class="post">
					<h2>asdasdasdasdasdasdasdasdasdasdasdasdasdas</h2>
				</div>
				<div class="post" style="background: #c9c9c9;">
					<div class="picture" style="width:35%;"><h2>Вставьте фотографию</h2></div>
					<button id="creatething"><h5>опубликовать товар</h5></button>
				</div>
			</div>
		</div>
		<div class="col-lg-1"></div>
	</div>
</div>
<script>

</script>
</body>
</html> -->