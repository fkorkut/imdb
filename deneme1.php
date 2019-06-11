
<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$db = @new mysqli('localhost','root','','imdb');
		$db->set_charset("utf8");
		if ($db->connect_error)
		{
			die("Bağlantı hatası: " . $conn->connect_error);
		}
		
		
			$sql1 = "select * from film where filmID=1  ";
		    $sorgu1 = $db->prepare($sql1);
			$sorgu1-> execute();
			$sonuc1=$sorgu1->get_result();
			$gelen1 = $sonuc1->fetch_assoc();
			while($yazdir=mysql_fetch_array($gelen1)){
//Metin Alanını Metin Değişkenine Çekiyoruz.
		$metin = $yazdir['metin'];
			}
	}

?>