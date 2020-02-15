<!DOCTYPE html>
<?php
$menu = !empty($_GET['menu']) ? $_GET['menu'] : "1";


?>
<?php include "isi/koneksi/koneksi.php";
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Res-Train</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <style type="text/css">
        .jumbotron{
            background-image: url('img/bag-1.jpg');
            background-size: cover;
            background-repeat: none;
        }
    </style>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="index.php">Res-Train</a>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="tiket.php?menu=1">Cari Tiket</a>
                    </li>
                </ul>
	
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="cara-pesan/">Cara Memesan</a>
                    </li>
                        <?php session_start();
                            if(isset($_SESSION['username'])){
                        ?>
                    <li>
                        <ul class="nav navbar-nav navbar-right">
                    
                            <!-- alert notification end-->
                            <!-- user login dropdown start-->
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="username"> 
                                        <?php echo $_SESSION['username']; ?>
                                     </span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu extended logout">
                                    <div class="log-arrow-up"></div>
                                    <li class="eborder-top">
                                        <a href="cara-pesan/profil.php"><i class="icon_profile"></i> Lihat Profil</a>
                                    </li>
                                    <li>
                                        <a href="cara-pesan/edit.php"><i class="icon_mail_alt"></i> Ganti Password</a>
                                    </li>
                                    <li>
                                        <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- user login dropdown end -->
                        </ul>
                       
                    </li>
                    <?php
                        }else{
                        ?>
                    <li>
                        <a href="formlogin.php">Login</a>
                    </li>
                    <?php
                    }
                    ?>

<!--
                    <li>
                        <a href="#about">Cara Memesan</a>
                    </li>
                    <li>
                        <a href="login/">Login</a>
                    </li>
-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



  <div class="jumbotron" style="padding-top: 90px;margin: 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="color: white;">
                <h1>Beli Tiket Dengan Mudah</h1>      
                <p>Selamat Datang di website Res-Train Pemesanan Tiket Kereta Api Online.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
            <div class="panel-body" style="color:black;">
                

                </p>
                <form action="tiket.php?menu=5" method="post">
                           <!-- <input class="form-control" type="text" name="carika"  maxlength="30" placeholder=" Kota Asal" /> -->
                            <div class="form-group row">
                              <label for="example-search-input" class="col-xs-2 col-form-label">Stasiun Asal</label>
                              <div class="col-xs-10">
                                 <select name="carika" class="form-control" style="width: 100%;"> 
                                     <?php
                                        $sqlquery   = "select id_stasiun_asal, nama_stasiun_asal from stasiun_asal ";
                                        $hasilquery = mysqli_query($kdb1, $sqlquery) or die (mysql_error());
                                        while ( $baris = mysqli_fetch_assoc($hasilquery)) { ?>
                                            <option value="<?php echo $baris['id_stasiun_asal']; ?>">
                                              <?php echo $baris['nama_stasiun_asal']; ?>
                                            </option>
                                        <?php }
                                    ?>
                                    
                                    
                                </select>
                              </div>
                            </div>
                            
                            
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Stasiun Tujuan</label>
                                      <div class="col-xs-10">
                                        <select name="carikt" class="form-control" style="width: 100%;"> 
                                            <?php
                                              $sqlquery   = "select id_stasiun_tujuan, nama_stasiun_tujuan from stasiun_tujuan ";
                                              $hasilquery = mysqli_query($kdb1, $sqlquery) or die (mysql_error());
                                              while ( $baris = mysqli_fetch_assoc($hasilquery)) { ?>
                                                  <option value="<?php echo $baris['id_stasiun_tujuan']; ?>">
                                                    <?php echo $baris['nama_stasiun_tujuan']; ?>
                                                  </option>
                                              <?php }
                                            ?> 
                                        </select>
                                      </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Tanggal</label>
                                      <div class="col-xs-10">
                                         <input class="form-control" type="date" name="caritgl"  maxlength="30" placeholder="" value="<?php echo date('Y-m-d'); ?>" />
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label" ></label>
                                      <div class="col-xs-10">
                                         <input  type="submit" class="btn btn-primary" value="Cari Jadwal" style="float:left;"/>
                                      </div>
                                    </div>
                </form>

            </div>
        </div>
            </div>
            <div class="col-md-6">
                <img src="img/kereta-1.png" width="100%">
            </div>
        </div>
    </div>
    
  </div>
<!-- end jumbotron -->

    <div id="about" style="padding-top:60px;padding-bottom:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Mengapa memesan di Res-Train? </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="col-md-4">
                        <img src="img/booking.png">
                    </div>
                    <div class="col-md-8">
                        <h3>Sistem booking tepercaya</h3>
                        <p>Sistem kami dirancang khusus agar dapat terhubung langsung dengan PT KAI. Karena itu, bisa dipastikan e-tiket Anda akan terbit dan kursi Anda pun</p>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="col-md-4">
                        <img src="img/harga.png">
                    </div>
                    <div class="col-md-8">
                        <h3>Harga Terbaik</h3>
                        <p>Dapatkan harga tiket Kereta Api Indonesia yang kompetitif, dengan promo khusus untuk pelanggan dan member. Dan bukan cuma</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="col-md-4">
                        <img src="img/pembayaran.png">
                    </div>
                    <div class="col-md-8">
                        <h3>Berbagai Pilihan Pembayaran</h3>
                        <p>Beli tiket kereta api online jadi lebih mudah.</p>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="col-md-4">
                        <img src="img/pencarian.png">
                    </div>
                    <div class="col-md-8">
                        <h3>Hasil Pencarian Terlengkap</h3>
                        <p>Pesan tiket KAI yang sesuai dengan kebutuhan Anda. Di sini Anda dapat melihat semua jadwal kereta api hingga 90 hari ke depan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="copyright text-muted small">Copyright &copy; <a href="author/">SMK Telekomunikasi Darul 'Ulum</a>. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="js/jquery.js"></script>


    <script src="js/bootstrap.min.js"></script>
     <!--  JavaScript loading konfirmasi-->
    <script>
                            $('.btn').on('click', function(){
                            var $this = $(this);
                            $this.button('loading');
                            setTimeout(function(){
                                       $this.button('reset');
                                       }, 8000);
                            });
      </script>
     <script>
                            $("submit").on('click', function(){
                            var $btn = $(this);
                            $btn.button('loading');
                            setTimeout(function(){
                                       $btn.button('reset');
                                       }, 8000);
                            });
                            </script>

</body>

</html>
