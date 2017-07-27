<?php include 'webkartali.php';

if (empty($_SESSION['user'])) {
  header('Location: index.php');
}


$GorevBasligi    = @$_POST['GorevBasligi'];
$GorevAciklama   = @$_POST['GorevAciklama'];
$YoneticiAciklama= @$_POST['YoneticiAciklama'];
$GorevDurum      = @$_POST['GorevDurum'];
$DuzenlemeTarihi = @$_POST['KayitTarihi'];
$GorevSonuc      = @$_POST['GorevSonuc'];

$idcik           = @$_POST['duzenlenecekid'];


/*
echo $GorevBasligi."<br>";
echo $GorevAciklama."<br>";
echo $GorevDurum."<br>";
echo $KayitTarihi."<br>";
*/

$gorevi_duzenle = mysqli_query($connn, "UPDATE tum_gorevler SET `grv_baslik` = '$GorevBasligi',
 `grv_icerik` = '$GorevAciklama',
 `grv_icerik_yonetici` = '$YoneticiAciklama',
  `grv_bitis_tarih` = '$DuzenlemeTarihi',
   `grv_onemi` = '$GorevDurum',
    `grv_sonuc` = '$GorevSonuc' WHERE `tum_gorevler`.`grv_id` = '$idcik';");


if ($gorevi_duzenle) {
	header('Location: gorev_duzenle.php?id='.$idcik.'&sonuc=1 ');
} else {
	header('Location: gorev_duzenle.php?id='.$idcik.'&sonuc=2 ');
}

 ?>