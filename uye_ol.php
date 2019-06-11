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

<?PHP
	$adHata = $soyadHata = $mailHata = $sifreHata = $veritabaniHata = ""; 
	$adKontrol = $soyadKontrol = $mailKontrol = $sifreKontrol = 0;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$db = @new mysqli('localhost','root','','imdb');
		$db->set_charset("utf8");
		if ($db->connect_error)
		{
			die("Bağlantı hatası: " . $conn->connect_error);
		}
	
	$ad = test_input($_POST['Adi']);
	$soyad = test_input($_POST['Soyadi']);
	$mail = test_input($_POST['mail']);
	$kAdi = test_input($_POST['kAdi']);
	$sifre = test_input($_POST['Sifre']);
	
	if(empty($ad)){
		$adHata = "İsim Boş Bırakılamaz .. ";
		$adKontrol = 0;
	}
	elseif(!preg_match("/^[a-zA-ZÇŞĞÜÖİçşğüöı ]*$/",$ad)){
			$adHata = "Sadece harf giriniz"; 
			$adKontrol = 0;
		
		}
	else 
			$adKontrol = 1;
	if(empty($soyad)){
		$soyadHata = "Soyad Boş Bırakılamaz ..";
		$soyadKontrol = 0;
	}
	elseif(!preg_match("/^[a-zA-ZÇŞĞÜÖİçşğüöı ]*$/",$soyad)) {
			
			$soyadHata = "Sadece harf giriniz"; 
			$soyadKontrol = 0;
			
		}
		else
			$soyadKontrol = 1;
	if(empty($mail)) {
			 $mailHata = "Mail boş Bırakılamaz .. ";
			 $kontrolemail = 0;
		} 
		elseif(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
			
				   $mailHata = "Geçersiz Mail Formatı"; 
				   $mailKontrol = 0;		
		    }
		else
			$mailKontrol = 1;
		if(empty($sifre)) {
			$sifreHata = "Şifre Boş Bırakılamaz ..";
			$sifreKontrol = 0;
		} 
		else
			$sifreKontrol = 1;
		if($adKontrol == 1 && $soyadKontrol == 1 && $mailKontrol == 1 && $sifreKontrol == 1)
		{
		// Tabloya bağlanma
			$sorgu = $db->prepare("insert into uye values (null,?,?,?,?,null,?)");
			$sorgu->bind_param("sssss",$ad,$soyad,$kAdi,$sifre,$mail);
			if($sorgu -> execute() == 0)
			{
				$veritabaniHata = "kayıt işlemi başarısız .. ";
				header("refresh:1:url=uye_ol.php");
				die();
			}
			else
			{
				if(!isset($_SESSION))
				{
					session_start();
				}
					$uyeKayit = $db -> prepare("select * from uye where kullaniciAdi = ?");
					$uyeKayit -> bind_param("s",$kAdi);
					$uyeKayit -> execute();
					$sonucKayit = $uyeKayit -> get_result();
					$row = $sonucKayit -> fetch_array();
					$_SESSION['Adi'] = $row['uyeAdi'];
					$_SESSION['kAdi'] = $row['kullaniciAdi'];
					header("location:uye_index.php");
				  }
			   }
			}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<!-- End Header -->

<!-- Begin Wrapper -->
<div class="wrapper"><!-- Begin Intro -->
<ul class="social">
<li><a class="rss" href="#"></a></li><li><a class="facebook" href="https://www.facebook.com/pages/NFS/231342387036317?ref=hl"></a></li><li><a class="twitter" href="#"></a></li><li><a class="pinterest" href="#"></a></li><li><a class="dribbble" href="#"></a></li><li><a class="flickr" href="#"></a></li><li><a class="linkedin" href="#"></a></li></ul><!-- End Intro --> 

<!-- Begin Container -->
<div class="content box">


		
<h3>Kayıt Ol</h3>
<p>
Üye olmak için lütfen doldurunuz.</p>



<div class="form-container">
	<form method= "POST">
		<?php echo $veritabaniHata; ?>
		<fieldset>
			<ol>
			<br>
				<a class="form-row text-input-row">
					<label>Ad</label>
					<input type="text" name="Adi" value="" class="text-input required"/>
					<span><?php echo $adHata; ?></span>
				</a>
				<br>
				<a class="form-row text-input-row">
					<label>Soyadı</label>
					<input type="text" name="Soyadi" value="" />
					<span class="error"> <?php echo $soyadHata; ?> </span>
				</a> 
				<br>
				<a class="form-row text-input-row">
					<label>Kullanıcı Adı</label>
					<input type="text" name="kAdi" value=""	/>
				</a>
				<br>
				<a class="form-row text-input-row">
					<label>E-mail</label>
					<input type="text" name="mail" value=""	/>
					<span class="error"> <?php echo $mailHata; ?> </span>
				</a>
				<br>
				<a class="form-row text-input-row">
					<label>Şifre</label><input type="password" name="Sifre" value=""/>
					<span class="error"> <?php echo $sifreHata; ?> </span>
				</a> 
				<br>
				<br>
				<a class="button"><input type="submit" value="Kaydol" name="submit" class="btn-submit" /></a>
			</ol>
		</fieldset>
	</form>
</div>
</div>


</div>




<!--End Sidebar -->
<div class="clear"></div>

</div>
<!-- End Wrapper -->
<div class="site-generator-wrapper">
	<div class="site-generator">Copyright © 2015 Tüm hakları NFS.com'a aittir. </div>
</div>
<!-- End Footer --> 
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
</html>