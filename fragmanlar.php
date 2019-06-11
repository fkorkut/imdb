<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php
//include("ayar.php");
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

<form action="#" method="POST" enctype="multipart/form-data">

<?php

	$db = @new mysqli('localhost','root','','imdb');
		if($db->connect_errno)
			die("bağlantı hatası".$db->connect_error);
			$db->set_charset("utf8");

			echo'<CENTER><select name="film" id="film" class="note-box"></CENTER>';
			$sorgu = $db->prepare('select * from film');
			$sorgu->execute();
			$sonuc = $sorgu->get_result();

		while ($veri = $sonuc->fetch_assoc()){
			
			echo '<option value = '.$veri['FilmID'].' > '. $veri['filmAdi']. '</option>';
		
		}

			$filmId = $_POST["film"];



				echo'
									</select>
								</div>
								
								<div class="form-group">
									<CENTER>
								
								<P>
								<button type="submit" name="Seç" class="download-box">Fragman İzle</button>
								<BR>
								<B>&nbsp; &nbsp;</B>
								</CENTER>
									
									
								</div>';

								if($_POST){
									$sorgu1 = $db->prepare("select * from film F 
									inner join filmyonetmenleri Y on Y.yonetmenID=F.yonetmenID
									inner join fragman FG on FG.fragmanID=F.fragmanID
									inner join senaryo S on S.senaryoID=F.senaryoID
									inner join resimgalerisi G on G.resimGaleriID = F.resimGaleriID
									where FilmID = $filmId ");
									$sorgu1->execute();
									$sonuc1 = $sorgu1->get_result();

while ($veri = $sonuc1->fetch_assoc()){
	
	echo '
		  <div class="box">

		<h1 class="title">'.$veri['filmAdi'].'</h1>
		
		
	<div class="one-third">
		<br><br>
		
			<div class="outer none"><span ><img src='.$veri['resimUrl'].' width="250" height="315"  </span></div>
		</div>
		
		<div class="two-third last">
			<h2>FRAGMAN</h2>
			<iframe width="560" height="315" src='.$veri['fragmanUrl'].' frameborder="0" allowfullscreen></iframe>
			<p>Senaryo  : '.$veri['filminSenaryosu'].'</p>
			</div>
		<div class="clear"></div>

</div>';

}
}

		 

?>
</form>
</div>
<!-- End Wrapper -->


<div class="site-generator-wrapper">
	<div class="site-generator">Copyright © 2015 Tüm hakları NFS.com'a aittir. </div>
</div>
<!-- End Footer --> 
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
</html>