<?php include 'webkartali.php';

if (empty($_SESSION['user'])) {
  header('Location: index.php');
}


$GorevBasligi  = @$_POST['GorevBasligi'];
$GorevAciklama = @$_POST['GorevAciklama'];
$GorevDurum    = @$_POST['GorevDurum'];
$KayitTarihi   = @$_POST['KayitTarihi'];

$gorevi_kaydet = mysqli_query($connn, "INSERT INTO tum_gorevler (`grv_id`, `grv_baslik`,
 `grv_icerik`, `grv_baslama_tarih`,
  `grv_bitis_tarih`, `grv_onemi`,
   `grv_sonuc`) VALUES (NULL, '$GorevBasligi',
    '$GorevAciklama', '$KayitTarihi',
     '', '$GorevDurum', 'Bitmedi!');");


if ($gorevi_kaydet) {
	header('Location: anasayfa.php?sonuc=1 ');
} else {
	header('Location: anasayfa.php?sonuc=2 ');
}
 ?>