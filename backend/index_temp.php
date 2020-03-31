<?php
	session_start();
	$_SESSION['message'] = "";
	$_SESSION['error'] = false;

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet"/>
		<!-- <link rel="stylesheet" href="./css/product-main.css" /> -->
		<link rel="stylesheet" href="./css/main.min.css" />
		<script src="./js/jquery.min.js"></script>
		<title>Backend</title>

		
	</head>
	<body>
		<div class="container">
		<div class="message-box form-box">
		</div>   
			<header class="header">
				
				<div class="header__logo">
					<img src="img/logo.png" alt="logo" class="logo"/>	
				</div>

				<form action="" class="search">
					<input
						type="text"
						class="search__input"
						placeholder="Search"
					/>
					<button class="search__btn">
						<svg class="search__icon">
							<use xlink:href="./img/sprite.svg#icon-search">
						</svg>
					</button>
				</form>

				<nav class="user-nav">
					<div class="user-nav__icon-box">
						<svg class="user-nav__icon">
							<use xlink:href="./img/SVG1/sprite.svg#icon-bookmarks"></use>
						</svg>
						<span class="user-nav__notification">1</span>
					</div>
					<div class="user-nav__icon-box">
						<svg class="user-nav__icon">
							<use xlink:href="./img/SVG1/sprite.svg#icon-chat"></use>
						</svg>
						<span class="user-nav__notification">3</span>
					</div>	

					<div class="user-nav__user">	
						<img src="./img/user.jpg" alt="user" class="user-nav__user-photo">
						<span class="user-nav__user-name"></span>
					</div>
				</nav>

			</header>

			<div class="content">
				
				<nav class="sidebar">
					
					<ul class="nav">
					
						<li class="nav__item">
							<a href="main" class="nav__links ">
								<svg class="nav__icon">
									<use xlink:href="./img/SVG1/sprite.svg#icon-home"></use>
								</svg>
								<span class="nav__text">dashboard</span>
							</a>
						</li>
						<li class="nav__item">
							<a href="product" class="nav__links">
								<svg class="nav__icon">
									<use xlink:href="./img/SVG1/sprite.svg#icon-shopping_basket"></use>
								</svg>
								<span class="nav__text">Product</span>
							</a>
						</li>
						
						<li class="nav__item">
							<a href="manage" class="nav__links">
								<svg class="nav__icon">
									<use xlink:href="./img/SVG1/sprite.svg#icon-aircraft-take-off"></use>
								</svg>
								<span class="nav__text">Manage</span>
							</a>
						</li>
						<li class="nav__item">
							<a href="order" class="nav__links">
								<svg class="nav__icon">
									<use xlink:href="./img/SVG1/sprite.svg#icon-shopping_basket"></use>
								</svg>
								<span class="nav__text">Order</span>
							</a>
						</li>
							
						<li class="nav__item">
							<a href="" class="nav__links">
								<svg class="nav__icon">
									<use xlink:href="./img/SVG1/sprite.svg#icon-key"></use>
								</svg>
								<span class="nav__text">setting</span>
							</a>
						</li>
							
						<li class="nav__item">
							<a href="" class="nav__links">								
									<svg class="nav__icon">
									<use xlink:href="./img/SVG1/sprite.svg#icon-map"></use>
								</svg>
								<span class="nav__text">Admin</span>
							</a>
						</li>
					</ul>
					<div class="footer">
						&copy; 2020. <br>All right reserved.
					</div>
				</nav>
				
				
				<main class="hotel-view" id="content"></main>
			  

			</div>
		</div>

		<!-- remove this after development -->
		<script src="./js/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
		<!-- <script src=""></script> -->
		<script src="./js/script.js"></script>
		
	</body>
</html>
