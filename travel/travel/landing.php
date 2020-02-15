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
        #myCarousel .item{
            max-height: 400px !important;
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
                        <a href="index.php?cari=1">Cari Tiket</a>
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


    

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="img/beg-1.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h1>Pesan Tiket Dengan Mudah</h1>
          <p>Nikmati liburanmu dengan mudah</p>
          <a href="index.php?cari=1" class="btn btn-primary">Cari Tiket</a>
        </div>
      </div>

      <div class="item">
        <img src="img/beg-2.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h1>Pesan Tiket Dengan Mudah</h1>
          <p>Nikmati liburanmu dengan mudah</p>
          <a href="index.php?cari=1" class="btn btn-primary">Cari Tiket</a>
        </div>
      </div>
    
      <div class="item">
        <img src="img/beg-3.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h1>Pesan Tiket Dengan Mudah</h1>
          <p>Nikmati liburanmu dengan mudah</p>
          <a href="index.php?cari=1" class="btn btn-primary">Cari Tiket</a>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


    <div id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    
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
