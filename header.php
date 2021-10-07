<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
	<link rel="stylesheet" href="css/styles.css">
</head>

<body>

	<?php include('inc/dev-menu.php'); ?>

	<div class="d-none">
		<?php include('inc/svgmap.php'); ?>
	</div>

	<header class="header" id="header">
		<a href="/" class="logo">
			<img src="img/logo.png" alt="">
		</a>
		<button class="btn-light-tr btn-menu" id="btn-menu">
			<span class="menu-icon">
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
			</span>
			<span class="menu-name">Меню</span>
		</button>
		<div class="menu">
			<div class="menu-inner">
				<nav class="menu-nav">
					<ul class="main-menu">
						<li><a href="#">Головна</a></li>
						<li><a href="#">Курси</a></li>
						<li><a href="#">Вакансії</a></li>
						<li><a href="#">Про хаб</a></li>
					</ul>
				</nav>
				<div class="menu-buttons">
					<a href="#" class="btn-light-tr btn-with-icon">
						<svg class="icon tr-reflect">
							<use xlink:href="#arrow-long">
						</svg>
						<span>Роботодавцю</span>
					</a>
					<a href="#" class="btn-light">Особистий кабінет</a>
				</div>
			</div>
		</div>
	</header>