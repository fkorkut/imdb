
<html>
<head> </head>
<body> 
<?php
// Mysql Veri Tabanı Bağlantısını Yapıyoruz
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$db = @new mysqli('localhost','root','','imdb');
		$db->set_charset("utf8");
		if ($db->connect_error)
		{
			die("Bağlantı hatası: " . $conn->connect_error);
		}
	}	
		
	
	$sqlsorgu = mysql_query("select * from uye ORDER BY uyeId DESC");
// While Döngümüzü Yazıyoruz.
	while($yazdir=mysql_fetch_array($sqlsorgu)){
//Metin Alanını Metin Değişkenine Çekiyoruz.
	$metin = $yazdir['metin'];
	
?>

<table border="0">
	<tr>
		<td><?php echo $metin; ?></td>
	</tr>

</table>
<?php } ?>
</body>
</html>