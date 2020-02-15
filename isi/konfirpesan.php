<?php			
 
$idj = $_GET['idp'];
global $_POST; 

  if( empty($_POST["nomor_bangku"]))
  {
    echo "<script>alert('Semua field harus terisi'); window.location = 'tiket.php?menu=8&idp=$idj'</script>";
  }else{
    $sql  = " insert into `pesan` (`id_pesan`,`id_user`,`id_jadwal`,`nomor_bangku`,`status`) 
    values ( 
    NULL,
    '".$_POST["id_user"]."',
    '".$_POST["id_jadwal"]."',
    '".$_POST["nomor_bangku"]."',
    'Belum Bayar' )";		  
    mysqli_query($kdb1, $sql) or die(mysql_error()); 
    ?> <script language="javascript">document.location.href="tiket.php?menu=10&i=<?php echo $idj; ?>";</script> <?php
  }



?>
