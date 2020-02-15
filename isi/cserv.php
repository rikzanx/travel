
    
    <!-- Header -->
    <a name="about"></a>
    <div>
        <div class="container">

            <div class="row">
                <div class="col-lg-12">

                        <div class="col-md-12">
                        <h3 class="indent-left margin-bot"><a class="grid1-desc">Form Pengaduan - Pelayanan Pelanggan</a></h3>   <br/> <br/>
                        </div>
                        <div class="col-md-12">
                             



<h4></h4> 
<div class="col-md-6">             
<form name="register_btn" action="tiket.php?menu=20" method="POST"> 
               
<?php 
    if(isset($_SESSION['username'])){

    $zet = $_SESSION['username'];

    $querya = "select * from user where username = '$zet' ";

    $resultan=mysqli_query($kdb1,$querya) or die(mysql_error());
    while($rom=mysqli_fetch_object($resultan))
       {
        

?>
<div class="form-group">
  
    <input type="hidden" name="username" id="exampleInputNama3" class="form-control" value=<?php echo $rom -> username; ?> readonly/>

</div>
<div class="form-group">
 
From :
    <input type="text" name="nama" id="exampleInputNama3" class="form-control" value=<?php echo $rom -> nama_user; ?> readonly/>

</div>
<?php
$sql2 = mysqli_query($kdb1, "select email from admin where id_admin = '1'");
       while ($j2   = mysqli_fetch_object($sql2))
       {
?>
<div class="form-group">
 
To :
    <input type="text" name="email" id="exampleInputNama3" class="form-control" value=<?php echo $j2 -> email; ?> readonly/>

</div>
<?php }?>
<div class="hidden form-group">

    <input type="text" name="id_member" id="id_user" class="hidden form-control" value=<?php echo $rom -> id_user; ?> />

</div>
<?php } } ?>
<div class="form-group">
   <label class="sr-only" for="exampleInputAlamat3">Judul Keluhan Anda:</label>

    <input type="text" name="j_keluhan" id="j_keluhan" class="form-control" placeholder="masukkan judul keluhan anda">

</div>
<div class="form-group">
  <label class="sr-only" for="exampleInputTelepon3">Detail Keluhan Anda:</label>

    <textarea class="textarea" name="d_keluhan" id="d_keluhan"  class="form-control" placeholder="masukkan penjelasan keluhan anda" required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px 
                                        solid #000; padding: 10px; color: black;"></textarea>

</div>
       <input type="submit" class="btn btn-success" name="register_btn" value="Kirim Keluhan">
        
</form>
</div>

                        </div> 

                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->


    <!-- Footer -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>