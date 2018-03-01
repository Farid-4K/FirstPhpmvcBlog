<?php
	require "db.php";
if (isset($_POST['do_create'])){
	$post = R::dispense('markets');
	$post -> name = $_POST['name'];
	$post -> clock = date('d.m.Y H:i:s');
	$post -> inform = $_POST['info'];
	$post -> category = $_POST['category'];
	$post -> email = $_POST['email'];
	$post -> password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	R::store($post);
	header('location:/mymarket.php');
}

if(isset($_POST['do_login']))
	{$errors = array();
		$user = R::findone('markets', 'email = ?', array($_POST['email_login']));
		if($user){
			if(password_verify($_POST['password_login'], $user->password)==$user->password)
			{ 
				$_SESSION['logged_user'] = $user;
				header('location:/mymarket.php');
			}else{$errors[]='Пароль неверный';}
		}
		else{$errors[]='Пользователь не найден';}
		if(! empty($errors))
			{echo array_shift($errors);
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/custom.bootstrap.grid.css">
	<meta charset="UTF-8">
	<title>Создание магазина</title>
</head>
<style>
	.container textarea{width:100%;height:100px;}
</style>
<body>
	<div class="container post">
		<form method="POST">
			<textarea placeholder="Название магазина" required name="name"></textarea>
			<textarea placeholder="Описание магазина (Не обязательно)" name="info"></textarea>
			<textarea id="categorya" placeholder="Категория" required name="category"></textarea>
			<input type="password" required placeholder="Пароль" name="password">
			<input type="email" placeholder="Почта" required name="email">
			<input type="submit" value="Создать магазин" required name="do_create">
			<h5>Доступные категории: Игрушки, Одежда.</h5>
		</form>
	</div>
	<div class="post">
		<form method="POST">
			<h4>Если вы уже создавали магазин, войдите.</h4>
			<input type="password" placeholder="Пароль" name="password_login">
			<input type="email" placeholder="Почта" required name="email_login">
			<input type="submit" value="Войти в свой магазин" required name="do_login">
		</form>	
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
				<div class="www-inform col-lg-12"><h1>сдесь вы можете содать свой магазин<br>Выполните три простых шага</h1></div>
				<div class="col-lg-12">
					<form method="POST">
						<div class="create-market-form">
							<textarea placeholder="Название магазина" required name="name"></textarea>
							<textarea placeholder="Описание магазина" required name="info"></textarea>
							<textarea id="categorya" placeholder="Категория" required name="category"></textarea>
							<input type="password" placeholder="Пароль" name="password">
							<input type="email" placeholder="Почта" required name="email">
							<input type="submit" required name="do_create">
							<h5>Доступные категории: Игрушки, Одежда.</h5>
						</div>
					</form>
				</div>
			</div>
		</div>
	<div class="col-lg-1"></div>
</div>
<script>
</script>
</body>
</html> -->