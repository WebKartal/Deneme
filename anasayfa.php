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
            <li class="active"><a href="anasayfa.php"><i class="fa fa-home"></i><span>AnaSayfa</span></a></li>
            <li><a href="gorevler.php"><i class="fa fa-cogs"></i><span>Görevler</span></a></li>
            <li><a href="index.php"><i class="fa fa-sign-out"></i><span>Çıkış</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-home"></i> <?php echo $title; ?></h1>
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
        <div class="row mt-20">
          <div class="col-md-8">
            
  <!--Form Başla -->
<div class="card">
              <h3 class="card-title">Yeni Görev Tanımlama&nbsp;&nbsp;&nbsp;&nbsp; [<font color="88BDF2"><?php echo date("Y-m-d"); ?></font>]</h3>
              <br>
              <div class="card-body">
                <form action="gorev_kaydet.php" method="post">

                  <div class="form-group">
                    <label class="control-label">Görev Başlığı</label>
                    <input type="text" id="GorevBasligi" name="GorevBasligi" placeholder="Lütfen Başlık Belirtiniz.." class="form-control">
                  </div>
                  <br><br>
                  <div class="form-group">
                    <label class="control-label">Görev Detayları</label>
                    <textarea rows="4" name="GorevAciklama" placeholder="Lütfen Açıklama Yapınız.." class="form-control"></textarea>
                  </div>
                  <br><br>
                  <div class="form-group">
                    <label class="control-label">Durumu</label>
                    <div class="radio">
                      
                      <label>
                        <input type="radio" name="GorevDurum" value="Normal"><font color="#3a68bf"><b>Normal</b></font>
                      </label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                        <input type="radio" name="GorevDurum" value="Acil"><font color="red"><b>Acil</b></font>
                      </label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                        <input type="radio" name="GorevDurum" value="Önemsiz"><font color="#ff9800"><b>Önemsiz</b></font>
                      </label>
<br><br>
                    </div>
                  </div>
 
                
              </div>
              <div class="card-footer">
<input type="hidden" name="KayitTarihi" value="<?php echo date('Y-m-d H:i:sa'); ?>">                
              <input type="submit" class="btn btn-success icon-btn" value="Kaydet" >&nbsp;&nbsp;&nbsp;
              <input type="reset" class="btn btn-warning icon-btn" value="Formu Temizle">&nbsp;&nbsp;&nbsp;

              </div>
            </div>
           
            </form>
  <!-- Form Bitiş -->
          </div>
          
  <!-- Sol Bileşenler Başlangıç -->
          <div class="col-md-4">
            <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h4><b>Toplam Görev</b></h4>
                <p> <b>
<?php 
$toplam_gorv = mysqli_query($connn,  "SELECT count(*) as geneltplm FROM tum_gorevler");

$data=mysqli_fetch_array($toplam_gorv, MYSQLI_ASSOC);
echo $data['geneltplm'];

 ?>                  
                </b></p>
              </div>
            </div>

            <div class="widget-small info"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
              <div class="info">
                <h4>Tamamlanan</h4>
                <p> <b>
  <?php 
$toplam_gorv = mysqli_query($connn,  "SELECT count(*) as bitti FROM tum_gorevler WHERE grv_sonuc='Bitti' ");

$data=mysqli_fetch_array($toplam_gorv, MYSQLI_ASSOC);
echo $data['bitti'];

 ?>                 

                </b></p>
              </div>
            </div>

            <div class="widget-small danger"><i class="icon fa fa-thumbs-o-down fa-3x"></i>
              <div class="info">
                <h4>Bİtmeyen</h4>
                <p> <b>
<?php 
  $toplam_gorv = mysqli_query($connn,  "SELECT count(*) as bitmedi FROM tum_gorevler WHERE grv_sonuc='Bitmedi!' ");

  $data=mysqli_fetch_array($toplam_gorv, MYSQLI_ASSOC);
  echo $data['bitmedi'];
?>                   

                </b></p>
              </div>
            </div>




           <div class="widget-small primary coloured-icon"><i class="icon fa fa-star fa-3x"></i>
              <div class="info">
                <h4>İşleme Alındı...</h4>
                <p> <b>
<?php 
  $toplam_gorv = mysqli_query($connn,  "SELECT count(*) as isleme_alindi FROM tum_gorevler WHERE grv_sonuc='İşleme Alındı...' ");

  $data=mysqli_fetch_array($toplam_gorv, MYSQLI_ASSOC);
  echo $data['isleme_alindi'];
?>                   

                </b></p>
              </div>
            </div>




            <div class="widget-small warning coloured-icon"><i class="icon fa fa-sort fa-3x"></i>
              <div class="info">
                <h4>Normal</h4>
                <p> <b>
<?php 
  $toplam_gorv = mysqli_query($connn,  "SELECT count(*) as normal FROM tum_gorevler WHERE grv_onemi='Normal' ");

  $data=mysqli_fetch_array($toplam_gorv, MYSQLI_ASSOC);
  echo $data['normal'];
?>
                </b></p>
              </div>
            </div>

            <div class="widget-small danger"><i class="icon fa fa-warning fa-3x"></i>
              <div class="info">
                <h4>Acİl</h4>
                <p> <b>
<?php 
  $toplam_gorv = mysqli_query($connn,  "SELECT count(*) as acildir FROM tum_gorevler WHERE grv_onemi='Acil' ");

  $data=mysqli_fetch_array($toplam_gorv, MYSQLI_ASSOC);
  echo $data['acildir'];
?>                  
                </b></p>
              </div>
            </div>

            <div class="widget-small warning"><i class="icon fa fa-spinner fa-3x"></i>
              <div class="info">
                <h4>Önemsİz</h4>
                <p> <b>
<?php 
  $toplam_gorv = mysqli_query($connn,  "SELECT count(*) as onemsizdir FROM tum_gorevler WHERE grv_onemi='Önemsiz' ");

  $data=mysqli_fetch_array($toplam_gorv, MYSQLI_ASSOC);
  echo $data['onemsizdir'];
?>                  
                </b></p>
              </div>
            </div>

          </div>
          
         
<!--Sol Bileşenler Bitiş -->

      </div>
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/essential-plugins.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.vmap.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.vmap.world.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.vmap.sampledata.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	var data = {
      		labels: ["January", "February", "March", "April", "May"],
      		datasets: [
      			{
      				label: "My First dataset",
      				fillColor: "rgba(220,220,220,0.2)",
      				strokeColor: "rgba(220,220,220,1)",
      				pointColor: "rgba(220,220,220,1)",
      				pointStrokeColor: "#fff",
      				pointHighlightFill: "#fff",
      				pointHighlightStroke: "rgba(220,220,220,1)",
      				data: [65, 59, 80, 81, 56]
      			},
      			{
      				label: "My Second dataset",
      				fillColor: "rgba(151,187,205,0.2)",
      				strokeColor: "rgba(151,187,205,1)",
      				pointColor: "rgba(151,187,205,1)",
      				pointStrokeColor: "#fff",
      				pointHighlightFill: "#fff",
      				pointHighlightStroke: "rgba(151,187,205,1)",
      				data: [28, 48, 40, 19, 86]
      			}
      		]
      	};
      	var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      	var lineChart = new Chart(ctxl).Line(data);
      
      	var map = $('#demo-map');
      	map.vectorMap({
      		map: 'world_en',
      		backgroundColor: '#fff',
      		color: '#333',
      		hoverOpacity: 0.7,
      		selectedColor: '#666666',
      		enableZoom: true,
      		showTooltip: true,
      		scaleColors: ['#C8EEFF', '#006491'],
      		values: sample_data,
      		normalizeFunction: 'polynomial'
      	});
      });
    </script>

<script>
  $(window).load(function() {
      $( "#cevap" ).hide( 5000 );
  });
</script>

  </body>
</html>
<!--

 * Bu Uygulama ücretsiz olarak www.webkartali.com tarafından geliştirilmiştir.
 * İş takip uygulaması ile ilgli yeni özellikler eklemeye devam edeceğiz.
 * Yeni güncellemeleri web sitemizden temin/takip edebilirsiniz.

 * Web Sitemizdeki diğer scriptlere göz atmayı unutmayınız :)

 www.webkartali.com


-->