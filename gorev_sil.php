<?php include 'webkartali.php';

if (empty($_SESSION['user'])) {
  header('Location: index.php');
}

$silinecek = @$_GET['id'];

/*
echo $GorevBasligi."<br>";
echo $GorevAciklama."<br>";
echo $GorevDurum."<br>";
echo $KayitTarihi."<br>";
*/

$geleni_sil = mysqli_query($connn, "DELETE FROM tum_gorevler WHERE grv_id =$silinecek ");


if ($geleni_sil) {
	header('Location: gorevler.php ');
} else {
	header('Location: gorevler.php ');
}
 ?>
