<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.9">
	<title><?= $title; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/public/styles/grid.css">
	<link rel="stylesheet" type="text/css" href="/public/styles/style.css">
	<link rel="stylesheet" type="text/css" href="/public/styles/index.css">
	<link rel="stylesheet" href="/public/styles/market.css">
</head>
<body>

	<div data-ripple-color="#fff" id="menu" class="menu material-ripple z-depth-1 hoverable"></div>	
	<div class="z-depth-5 menu-area">
		<?php foreach ($buttons as list($title, $href, $id)): ?>
			<div data-ripple-color="#abd" class="z-depth-1 material-ripple menu-button h3 hoverable">
				<a id="<?=$id?>" href="<?=$href?>"><?=$title?></a>
			</div>
		<?php endforeach; unset($header, $href, $title); ?>
	</div>
	
	<?= $content; ?>


<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>