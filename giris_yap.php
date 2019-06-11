<!DOCTYPE HTML>
<html lang="en-US">
<head>
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
					<li class="active"><a href="index.php">ANA SAYFA</a>
					</li>
					<li><a href="">FİLMLER</a>
						<ul>
							<li><a href="once_giris_yap.php">VİZYONDAKİLER</a></li>
							<li><a href="once_giris_yap.php">FRAGMANLAR</a></li>
						</ul>
					</li>
					<li><a href="">ÜNLÜLER</a>
						<ul>
							<li><a href="once_giris_yap.php">OYUNCULAR</a></li>
							<li><a href="once_giris_yap.php">YÖNETMENLER</a></li>
						</ul>
					</li>
					<li><a href="">KULLANICI İŞLEMLERİ</a>
						<ul>
							<li><a href="giris_yap.php">GİRİŞ YAP</a></li>
							<li><a href="uye_ol.php">ÜYE OL</a></li>
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

<!-- Begin Container -->
<div class="content box">

<?php
	
	$Hata = $Hata1 = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$db = @new mysqli('localhost','root','','imdb');
		$db->set_charset("utf8");
		if ($db->connect_error)
		{
			die("Bağlantı hatası: " . $conn->connect_error);
		}
		
		
			$sql = "select * from uye where kullaniciAdi=? and uyeSifre=? ";
		    $sorgu = $db->prepare($sql);
		    $sorgu->bind_param("ss",$_POST['user'],$_POST['pass']);
			$sorgu-> execute();
			$sonuc=$sorgu->get_result();
			$veri=$sonuc->fetch_assoc();
		
	}
	if($_POST)
	{
		if(isset($_POST['user']) && isset($_POST['pass']))
		{
			$kullaniciad = $_POST['user'];
			$sifre = $_POST['pass'];
			if(empty($kullaniciad) || empty($sifre))
			{
				$Hata = "Kullanıcı Adı veya Şİfreyi Girmediniz..";
			}
			else{
				if($kullaniciad==$veri['kullaniciAdi'] && $sifre == $veri['uyeSifre'])
				{
					session_start();
					header("location:uye_index.php");
				}
				else
					$Hata1 = "Kullanıcı Adınız Veya Şifreniz Hatalı..";
		}
		}
		
	}
	
	
?>
		
<h3>Giriş Yap</h3>
<p>Lütfen bilgilerinizi giriniz.</p>


<!-- Begin Container -->

<div class="form-container">
	<form method="POST">
		<fieldset>
			<ol>
			<span class="error"> <?php echo $Hata; ?> </span>
			<br>
				<a class="form-row text-input-row">
					<label>Kullanıcı Adı</label>
					<input type="text" name="user" value="" class="text-input required"/>
					
					
				</a>
				<br>
				<a class="form-row text-input-row">
					<label>Şifre</label><input type="password" name="pass" value=""/>
				</a>
					<span class="error"> <?php echo $Hata1; ?> </span>
				<br>				
				<br>
				<a class="button"><input type="submit" value="Giriş" name="submit" class="btn-submit" /></a>
			</ol>
		</fieldset>
	</form>
</div>

</div>



<!--End Sidebar -->
<div class="clear"></div>

</div>
<!-- End Wrapper -->

<!-- Begin Footer -->
<div class="footer-wrapper">
<div id="footer" class="four">
		<div id="first" class="widget-area">
			<div class="widget widget_search">
				<h3 class="widget-title">Search</h3>
				<form class="searchform" method="get" action="#">
					<input type="text" name="s" value="type and hit enter" onFocus="this.value=''" onBlur="this.value='type and hit enter'"/>
				</form>
			</div>
			<div class="widget widget_archive">
				<h3 class="widget-title">Archives</h3>
				<ul>
					<li><a href="#">September 2012</a> (6)</li>
					<li><a href="#">August 2012</a> (2)</li>
					<li><a href="#">July 2012</a> (2)</li>
					<li><a href="#">June 2012</a> (4)</li>
					<li><a href="#">May 2012</a> (3)</li>
					<li><a href="#">January 2012</a> (1)</li>
				</ul>
			</div>	
		</div><!-- #first .widget-area -->
	
		<div id="second" class="widget-area">
			<div id="twitter-2" class="widget widget_twitter">
					<h3 class="widget-title">Twitter</h3>
					
					<div id="twitter-wrapper">
						<div id="twitter"></div>
						<span class="username"><a href="http://twitter.com/elemisdesign">→ Follow @elemisdesign</a></span>
					</div>
			</div>
		</div><!-- #second .widget-area -->
	
		<div id="third" class="widget-area">
		<div id="example-widget-3" class="widget example">
			<h3 class="widget-title">Popular Posts</h3>
			<ul class="post-list">
			  	<li> 
			  		<div class="frame">
			  			<a href="#"><img src="style/images/art/s1.jpg" /></a>
			  		</div>
					<div class="meta">
					    <h6><a href="#">Charming Winter</a></h6>
					    <em>28th Sep 2012</em>
				    </div>
				</li>
				<li> 
			  		<div class="frame">
			  			<a href="#"><img src="style/images/art/s2.jpg" /></a>
			  		</div>
					<div class="meta">
					    <h6><a href="#">Trickling Stream</a></h6>
					    <em>5th Sep 2012</em>
				    </div>
				</li>
				<li> 
			  		<div class="frame">
			  			<a href="#"><img src="style/images/art/s3.jpg" /></a>
			  		</div>
					<div class="meta">
					    <h6><a href="#">Morning Glory</a></h6>
					    <em>26th Sep 2012</em>
				    </div>
				</li>
			</ul>
			
		</div>
		</div><!-- #third .widget-area -->
		
		<div id="fourth" class="widget-area">
		<div class="widget">
			<h3 class="widget-title">Flickr</h3>
			<ul class="flickr-feed"></ul>
			
		</div>
		</div><!-- #fourth .widget-area -->
	</div>
</div>
<div class="site-generator-wrapper">
	<div class="site-generator">Copyright © 2015 Tüm hakları NFS.com'a aittir. </div>
</div>
<!-- End Footer --> 
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
</html>