<?php			
 
  global $_POST; 

  
if( empty($_POST["j_keluhan"]) || empty($_POST["d_keluhan"]))
{
echo "<script>alert('Semua field harus terisi'); window.location = 'tiket.php?menu=19'</script>";
}else{
  $sql  = " insert into `keluhan` (`j_keluhan`,`d_keluhan`,`id_user`) 
  values ( 
  '".$_POST["j_keluhan"]."',
  '".$_POST["d_keluhan"]."',
  '".$_POST["id_user"]."' )";		  
  mysqli_query($kdb1, $sql) or die( mysql_error()); 



      // dapatkan email_pengguna dari database
      $sql2 = mysqli_query($kdb1, "select nama from user where id_user = '$_POST[id_user]'");
      $j2   = mysqli_fetch_array($sql2);

      $sql1 = mysqli_query($kdb1, "select email from admin where id_admin = '5'");
      $j1   = mysqli_fetch_array($sql2);

      $subjek = $_POST["j_keluhan"];
      $pesan = $_POST["d_keluhan"];

      // Kirim email dalam format HTML
      $dari = "From: $j2[nama]\r\n";
      $dari .= "Content-type: text/html\r\n";

      // Kirim password ke email admin
      mail($_POST['email'],$subjek,$pesan,$dari);

echo("<script>alert('Mohon maaf atas kekurangan pelayanan kami. Pengaduan yang anda kirim akan segera kami proses dan balasan pengaduan akan kami kirim ke email Anda. Terimakasih'); window.location = 'tiket.php'</script>");
}



?>
