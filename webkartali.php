<?php ob_start(); session_start();

$connn = @mysqli_connect("localhost","root","","gorevler");
@mysqli_query($connn, "SET NAMES utf8");
@mysqli_query($connn, "SET CHARACTER SET utf8");
@mysqli_query($connn, "SET COLLATION_CONNECTION='utf8_general_ci'");


// Bağlantı Kontrolü
if (mysqli_connect_errno())
  {
  echo "Mysql Data Bağlantısı Yapılamadı..: " . mysqli_connect_error();
  }

$title     = "Webkartalı V.01";
$kullanici = "admin";
$sifresi   = "123";

$hatali_sonuc = '<div class="col-lg-4" id="cevap">
 <div class="bs-component"> 	
   <div class="alert alert-dismissible alert-danger">
	 <strong>Bir Sorun Var! * İşlemi Başarısız.</strong>
   </div>
 </div>
</div>';

$basarili_sonuc ='<div class="col-lg-4" id="cevap">
  <div class="bs-component">
	  <div class="alert alert-dismissible alert-success">
	    <strong>İşlem Başarılı.</strong>
	  </div>
	</div>
 </div>';
/*
 * Bu Uygulama ücretsiz olarak www.webkartali.com tarafından geliştirilmiştir.
 * İş takip uygulaması ile ilgli yeni özellikler eklemeye devam edeceğiz.
 * Yeni güncellemeleri web sitemizden temin/takip edebilirsiniz.

 * Web Sitemizdeki diğer scriptlere göz atmayı unutmayınız :)

 www.webkartali.com
*/
?>