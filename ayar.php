<?php
	
	
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


?>