<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/public/styles/grid.css">
	<link rel="stylesheet" type="text/css" href="/public/styles/style.css">
	<link rel="stylesheet" type="text/css" href="/public/styles/index.css">
</head>
<body class="account-background">
	<?= $content; ?>

	<script>
		document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')
	</script>
</body>
</html>