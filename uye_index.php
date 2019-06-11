<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php
include("ayar.php");
session_start();
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>NFS</title>
<link rel="stylesheet" type="text/css" media="all" href="style.css" />
<link rel="stylesheet" type="text/css" href="style/css/media-queries.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,700,700italic|Open+Sans+Condensed:300,700' rel="stylesheet" type='text/css'>
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
<![endif]-->
<script type="text/javascript" src="style/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="style/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="style/js/retina.js"></script>
<script type="text/javascript" src="style/js/selectnav.js"></script>
<script type="text/javascript" src="style/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="style/js/jquery.fitvids.js"></script>
<script type="text/javascript" src="style/js/jquery.backstretch.min.js"></script>
<script type="text/javascript" src="style/js/jquery.dcflickr.1.0.js"></script>
<script type="text/javascript" src="style/js/twitter.min.js"></script>
<script type="text/javascript">
	$.backstretch("style/images/bg/1.jpg");
</script>
</head>
<body>
<div class="scanlines"></div>

<!-- Begin Header -->
<div class="header-wrapper opacity">
	<div class="header">
		<!-- Begin Logo -->
		<div class="logo">
		    <a href="index.php">
				<img src="style/images/logo.PNG" alt="" />
			</a>
	    </div>
		<!-- End Logo -->
		<!-- Begin Menu -->
		<div id="menu-wrapper">
			<div id="menu" class="menu">
				<ul id="tiny">
					<li class="active"><a href="uye_index.php">ANA SAYFA</a>
						
					</li>
					<li><a href="">FİLMLER</a>
						<ul>
						    <li><a href="vizyondakiler.php">VİZYONDAKİLER</a></li>
							<li><a href="fragmanlar.php">FRAGMANLAR</a></li>
						</ul>
					</li>
					<li><a href="">ÜNLÜLER</a>
						<ul>
							<li><a href="oyuncular.php">OYUNCULAR</a></li>
							<li><a href="yonetmenler.php">YÖNETMENLER</a></li>
						</ul>
					</li>
					<li>
					HOŞGELDİNİZ
						<ul>
							<li><a href="uye_ayarlar.php">AYARLAR</a></li>
							<li><a href="logout.php">ÇIKIŞ YAP</a></li>
						</ul>
					</li>
					
				</ul>
			</div>
		</div>
		<div class="clear"></div>
		<!-- End Menu -->
	</div>
</div>
<!-- End Header -->

<!-- Begin Wrapper -->
<div class="wrapper"><!-- Begin Intro -->
<ul class="social">
<li><a class="rss" href="#"></a></li><li><a class="facebook" href="https://www.facebook.com/pages/NFS/231342387036317?ref=hl"></a></li><li><a class="twitter" href="#"></a></li><li><a class="pinterest" href="#"></a></li><li><a class="dribbble" href="#"></a></li><li><a class="flickr" href="#"></a></li><li><a class="linkedin" href="#"></a></li></ul><!-- End Intro --> 

<!-- Begin Blog Grid -->
<div class="blog-wrap">
	<!-- Begin Blog -->
	<div class="blog-grid">
	<br><br><br>
		<!-- Begin Image Format -->
		<div class="post format-image box"> 
		
			<div class="frame">
				<a href="fragmanlar.php">
					<img src="style/images/art/8.png" width=500 height=100 alt="" />
				</a>
			</div>
			<h2 class="title"><a href="fragmanlar.php">Güncel Fragmanlar</a></h2>
			<p>Güncel Fragmanlara ulaşmak ve film bilgileri için resmi tıklaman yeterli :) </p>
			<div class="details">
				<span class="icon-image"><a href="#">Mayıs 16, 2015</a></span>
				<span class="likes"><a href="#" class="likeThis">44</a></span>
				<span class="comments"><a href="#">3</a></span>
			</div>
		</div>
		<!-- End Image Format -->

 	
		<!-- Begin Quote Format -->
		<div class="post format-quote box"> 
			<!-- Begin Image Format -->

			<div class="frame">
				<a href="vizyondakiler.php">
					<img src="style/images/art/13.jpg" width=500 height=300 alt="" />
				</a>
			</div>
			
			<div class="details">
				<span class="icon-image"><a href="#">Mayıs 16, 2015</a></span>
				<span class="likes"><a href="#" class="likeThis">44</a></span>
				<span class="comments"><a href="#">3</a></span>
			</div>
	
		</div>
		<!-- End Quote Format --> 	


		<!-- Begin Video Format -->
		<div class="post format-video box"> 
			<div class="video frame"><iframe src="style\videolar\7.mp4" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
			<h2 class="title"><a href="vizyondakiler.php">Birazda Müzik Dinleyelim</a></h2>
			<!--<p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
		-->
			<div class="details">
					<span class="icon-image"><a href="#">Mayıs 16, 2015</a></span>
				<span class="likes"><a href="#" class="likeThis">18</a></span>
				<span class="comments"><a href="#">1</a></span>
			</div>
			
		</div>
		<!-- End Video Format --> 					
	</div>
	<!-- End Blog -->
</div>
<!-- End Blog Grid -->
<div class="site-generator-wrapper">
	<div class="site-generator">Copyright © 2015 Tüm hakları NFS.com'a aittir. </div>
</div>
<!-- End Footer --> 
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
</html>