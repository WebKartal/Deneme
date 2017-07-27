<?php include 'webkartali.php';
$kayit_sonucu = @$_GET['sonuc'];

if (empty($_SESSION['user'])) {
  header('Location: index.php');
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title><?php echo $title ?></title>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a href="anasayfa.php" class="logo">WebKartalı</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a href="#" data-toggle="offcanvas" class="sidebar-toggle"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">

              <!-- User Menu-->
              
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img src="images/AhmeTT2.jpg" alt="User Image" class="img-circle"></div>
            <div class="pull-left info">
              <p><?php echo @$_SESSION['user']; ?></p>
              <p class="designation">Web Developer</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li><a href="anasayfa.php"><i class="fa fa-home"></i><span>AnaSayfa</span></a></li>
            <li class="active"><a href="gorevler.php"><i class="fa fa-cogs"></i><span>Görevler</span></a></li>
            <li><a href="index.php"><i class="fa fa-sign-out"></i><span>Çıkış</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-cogs"></i> Görevler Listesi</h1>
            <p>www.webkartali.com</p>
          </div>

<?php 

  if ($kayit_sonucu == "2") {
    echo $hatali_sonuc;
  } elseif ($kayit_sonucu == "1") {
    echo $basarili_sonuc;
  }else{
    echo "";
  }

?>

          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">AnaSyafa</a></li>
            </ul>
          </div>
        </div>
  <!-- Tablo Başlangıç -->
<div class="row">
          <div class="col-md-12">
           
            <div class="card">
              <div class="card-body">
                <table id="sampleTable" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th width='120'>İŞLEM</th>
                      <th>Başlık / Konu</th>
                      <th>Başlatma</th>
                      <th>Müdahale/Bitiş</th>
                      <th>Geçen Süre</th>
                      <th>Önemi</th>
                      <th>Sonuç</th>
                   </tr>
                  </thead>
                  <tbody>
                    
<?php 
$tumunu_cek = mysqli_query($connn, "SELECT * FROM tum_gorevler");
while ($tumunu_ayrs = mysqli_fetch_array($tumunu_cek, MYSQLI_ASSOC)) {

  echo '<tr>
    <td>'.$tumunu_ayrs['grv_id'].'</td>
   

    <td style="width:100px;"><a href="gorev_sil.php?id='.$tumunu_ayrs['grv_id'].'"><span class="label label-danger">Sil</span></a>
  
    <a href="gorev_duzenle.php?id='.$tumunu_ayrs['grv_id'].'"><span class="label label-info">Düzenle</span></a>
    
    <a href="gorev_tamamla.php?id='.$tumunu_ayrs['grv_id'].'"><span class="label label-success">Tamamla</span></a></td>

    <td>';

if ($tumunu_ayrs['grv_sonuc'] == "Bitti") {
  echo '<b><font color="#006400">'.$tumunu_ayrs['grv_baslik'].'</font></b>';
}elseif ($tumunu_ayrs['grv_sonuc'] == "İşleme Alındı...") {
  echo '<b><font color="#FF9800">'.$tumunu_ayrs['grv_baslik'].'</font></b>';
}else {
  echo '<b><font color="#cd3333">'.$tumunu_ayrs['grv_baslik'].'</font></b>';
}

    echo '</td>';

    echo '<td>'.$tumunu_ayrs['grv_baslama_tarih'].'</td>
    <td>';
$bittibea = $tumunu_ayrs['grv_bitis_tarih'];   
if ($bittibea == '0000-00-00 00:00:00') {
 echo "<font color='#cd3333'><b>".$bittibea."</b></font>";
} else {
  echo "<font color='blue'><b>".$bittibea."</b></font>";
}


    echo '</td><td>';

//tarihhhhhhh

$zaman=strtotime($tumunu_ayrs['grv_baslama_tarih']);

   $zaman_farki = time() - $zaman;
   $saniye      = $zaman_farki;
   $dakika      = round($zaman_farki/60);
   $saat        = round($zaman_farki/3600);
   $gun         = round($zaman_farki/86400);
   $hafta       = round($zaman_farki/604800);
   $ay          = round($zaman_farki/2419200);
   $yil         = round($zaman_farki/29030400);
   
if( $saniye < 60 ){
   if ($saniye == 0){
echo' az önce';
 } else {
echo' '.$saniye.' Saniye';}
} else if ( $dakika < 60 ){
echo' '.$dakika.' Dakika';
} else if ( $saat < 24 ){
echo' '.$saat.' Saat';
} else if ( $gun < 7 ){
echo' '.$gun.' Gün';
} else if ( $hafta < 4 ){
echo' '.$hafta.' Hafta';
} else if ( $ay < 12 ){
echo' '.$ay.' Ay';
} else {
echo' '.$yil.' Yıl';
   }

//tarihhhhhhhh


    echo '</td><td>';
$durumu_nedir = $tumunu_ayrs['grv_onemi'];

if ($durumu_nedir =="Acil") {
  echo '<font color="red"><b>Acil</b></font>';
} elseif ($durumu_nedir =="Normal") {
  echo '<font color="#3a68bf"><b>Normal</b></font>';
}elseif ($durumu_nedir =="Önemsiz") {
  echo '<font color="#ff9800"><b>Önemsiz</b></font>';
}


    echo '</td>
    <td>';

if ($tumunu_ayrs['grv_sonuc'] == "Bitti") {
  echo '<font color="#2F8F03">Tamamlandı :)</font>';
}elseif ($tumunu_ayrs['grv_sonuc'] == "İşleme Alındı...") {
  echo '<font color="#FF9800"><b>İşleme Alındı...</b></font>';
}else {
  echo '<font color="#F21655"><b>Bitmedi! :(</b></font>';
}


    echo '</td></tr>';

}

 ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/essential-plugins.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
    $('#sampleTable').DataTable({
      order: [ [0, 'desc'] ]
    });

    </script>
  <!-- Tablo Bitiş -->
<script>
  $(window).load(function() {
      $( "#cevap" ).hide( 5000 );
  });
</script>

  </body>
</html>