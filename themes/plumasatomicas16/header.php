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

	<body class="<?php if(is_home()){ echo 'index'; } ?>" id="<?php if(is_tax('stack')){ echo 'cardss'; } ?>">
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6&appId=280268005468566";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		<script>
	      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	      ga('create', 'UA-65194329-1', 'auto');
	      ga('send', 'pageview');
	    </script>
		<!-- HEADER -->

		<script type='text/javascript'>
		  var googletag = googletag || {};
		  googletag.cmd = googletag.cmd || [];
		  (function() {
		    var gads = document.createElement('script');
		    gads.async = true;
		    gads.type = 'text/javascript';
		    var useSSL = 'https:' == document.location.protocol;
		    gads.src = (useSSL ? 'https:' : 'http:') +
		      '//www.googletagservices.com/tag/js/gpt.js';
		    var node = document.getElementsByTagName('script')[0];
		    node.parentNode.insertBefore(gads, node);
		  })();
		</script>

		<script type='text/javascript'>
		  googletag.cmd.push(function() {
		    googletag.defineSlot('/9262827/plumas_atomicas_300x600', [300, 600], 'div-gpt-ad-1465487084939-0').addService(googletag.pubads());
		    googletag.defineSlot('/9262827/plumas_atomicas_300x600', [300, 600], 'div-gpt-ad-1465487084939-0-a').addService(googletag.pubads());
		    googletag.defineSlot('/9262827/plumas_atomicas_970x90', [[468, 60], [320, 250], [970, 250]], 'div-gpt-ad-1465487084939-1').addService(googletag.pubads());
		    googletag.defineSlot('/9262827/plumasatomicas_300x250_int', [[300, 250], [300, 100]], 'div-gpt-ad-1465487084939-2').addService(googletag.pubads());
		    googletag.defineSlot('/9262827/plumasatomicas_728x90_sup', [728, 90], 'div-gpt-ad-1465487084939-3').addService(googletag.pubads());
		    googletag.pubads().enableSingleRequest();
		    googletag.enableServices();
		  });
		</script>

		<!-- /HEADER -->
		<div class="oversc">
			<div class="bkgpa"></div>
			<div class="menu1">
				<a href="<?php echo site_url('archive'); ?>">EXTRA EXTRA!</a>
				<a href="https://www.facebook.com/Plumasatomicas/photos" target="_blank">PANFLETOS</a>
				<a href="https://medium.com/@plumasatomicas" target="_blank">ARTILLERÍA PESADA</a>
				<a href="<?php echo site_url("wadafact"); ?>">Wadafact</a>
				<a href="<?php echo site_url("card-stacks"); ?>">CARD STACK</a>
				<a href="https://www.facebook.com/Plumasatomicas/videos" target="_blank">VIDEO</a>
				<div class="bottom">
					<a href="#">PLUMAS</a>
					<a href="#">MANIFIESTO</a>
					<a href="#">CONTACTO</a>
					<a href="#">ANÚNCIATE</a>
				</div>
			</div>
			<div class="menu2">
				<h4>SECCIONES</h4><br>
				<a href="<?php echo site_url('archive'); ?>">EXTRA EXTRA!</a>
				<a href="https://www.facebook.com/Plumasatomicas/photos" target="_blank">PANFLETOS</a>
				<a href="https://medium.com/@plumasatomicas" target="_blank">ARTILLERÍA PESADA</a><br>
				<a href="<?php echo site_url("wadafact"); ?>">Wadafact</a>
				<a href="<?php echo site_url("card-stacks"); ?>">CARD STACK</a>
				<a href="https://www.facebook.com/Plumasatomicas/videos" target="_blank">VIDEO</a>
				<div class="bottom1">
					<h4>ACERCA DE</h4><br>
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
					<a href="<?php echo site_url(); ?>"><img id="header-logo" width="289" height="56" src="<?php echo THEMEPATH; ?>images/logo.svg"></a>
				</nav>
				<nav class="social">
					<div class="searchbar">
						<input type="text" value="Búsqueda" onfocus="if(this.value == 'Búsqueda') { this.value = ''; }">
						<a href="#"><img src="<?php echo THEMEPATH; ?>images/header/search.png"></a>
					</div>
					<a href="#"><img id="header-search" src="<?php echo THEMEPATH; ?>images/header/search.png"></a>
					<a class="socc" href="https://www.facebook.com/Plumasatomicas/" target="_blank"><img src="<?php echo THEMEPATH; ?>images/header/fb.png"></a>
					<a class="socc" href="https://twitter.com/plumasatomicas" target="_blank"><img src="<?php echo THEMEPATH; ?>images/header/tw.png"></a>
					<!-- <a class="socc" href="#" target="_blank"><img src="<?php echo THEMEPATH; ?>images/header/yt.png"></a> -->
					<a class="socc" href="https://www.instagram.com/plumasatomicas/" target="_blank"><img src="<?php echo THEMEPATH; ?>images/header/in.png"></a>
				</nav>
			</div>
		</header>
		
