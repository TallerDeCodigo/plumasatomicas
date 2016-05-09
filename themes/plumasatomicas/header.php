<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php print_title(); ?></title>
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.ico">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1, minimum-scale=1, height=device-height">
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400' rel='stylesheet' type='text/css'>
		<meta http-equiv="cleartype" content="on">
		<?php wp_head(); ?>
	</head>

	<body class="<?php if(is_home()){ echo 'index'; } ?>">
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
		<div class="oversc">
			<div class="bkgpa"></div>
			<div class="menu1">
				<a href="#">EXTRA EXTRA!</a>
				<a href="#">PANFLETOS</a>
				<a href="#">ARTILLERÍA PESADA</a>
				<a href="#">CARD STACK</a>
				<a href="#">VIDEO</a>
				<div class="bottom">
					<a href="#">PLUMAS</a>
					<a href="#">MANIFIESTO</a>
					<a href="#">CONTACTO</a>
					<a href="#">ANÚNCIATE</a>
				</div>
			</div>
			<div class="menu2">
				<a href="#">EXTRA<br>EXTRA!</a>
				<a class="oneline" href="#">PANFLETOS</a>
				<a href="#">ARTILLERÍA<br>PESADA</a>
				<a href="#">CARD STACK</a>
				<a href="#">VIDEO</a>
				<div class="bottom1">
					<a href="#">PLUMAS</a>
					<a href="#">MANIFIESTO</a>
					<a href="#">CONTACTO</a>
					<a href="#">ANÚNCIATE</a>
				</div>
			</div>
		</div>
		<header>
			<div class="wrapper normal">
				<nav class="menu">
					<div id="nav-icon3"><span></span><span></span><span></span><span></span></div>
					<a href="#"><img id="header-logo" width="289" height="56" src="<?php echo THEMEPATH; ?>images/logo.svg"></a>
				</nav>
				<nav class="social">
					<div class="searchbar">
						<input type="text" value="Búsqueda" onfocus="if(this.value == 'Búsqueda') { this.value = ''; }">
						<a href="#"><img src="<?php echo THEMEPATH; ?>images/header/search.png"></a>
					</div>
					<a href="#"><img id="header-search" src="<?php echo THEMEPATH; ?>images/header/search.png"></a>
					<a class="socc" href="#"><img src="<?php echo THEMEPATH; ?>images/header/fb.png"></a>
					<a class="socc" href="#"><img src="<?php echo THEMEPATH; ?>images/header/tw.png"></a>
					<a class="socc" href="#"><img src="<?php echo THEMEPATH; ?>images/header/yt.png"></a>
					<a class="socc" href="#"><img src="<?php echo THEMEPATH; ?>images/header/in.png"></a>
				</nav>
			</div>
		</header>
		
