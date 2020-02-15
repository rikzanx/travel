<?php 
  
  include('koneksi/koneksi.php');
  if( empty($_POST['no_resi']) && empty($_POST['no_rek']) && empty($_POST['tgl_transfer']) && empty($_POST['jam_transfer']))
  {

    echo "<script>alert('Semua field harus terisi'); window.location = 'tiket.php?menu=14'</script>";
      
  }else
  {
    $no_resi = $_POST['no_resi'];
    $no_rek = $_POST['no_rek'];
    $tgl_transfer = $_POST['tgl_transfer'];
    $jam_transfer = $_POST['jam_transfer'];
    $id_pesan = $_POST['id_pesan'];
    $status = '1';  
    $result = "SELECT * FROM konfirmasi_pesan WHERE no_resi='$no_resi'";
    $check =mysqli_query($kdb1,$result) or die(mysql_error());
    $fetch_resi = mysqli_num_rows($check);
    if ($fetch_resi == 1)
    {

      echo "<script>alert('No resi yang anda masukan sudah ada'); window.location = 'tiket.php?menu=14'</script>";    
    }
    else
    { 
        $sql2= "insert into `konfirmasi_pesan` (`no_resi`, `no_rek`, `tgl_transfer`, `jam_transfer`, `id_pesan`) VALUES ('$no_resi', '$no_rek', '$tgl_transfer', '$jam_transfer', '$id_pesan')";     
        $sql  = mysqli_query($kdb1, $sql2);
        
        // echo "c a";
        if ($sql) 
        { 
          $sql3  = " update  `pesan` set `status` = 'Dalam Proses' where id_pesan = '$id_pesan'";       
          $sql1  = mysqli_query($kdb1, $sql3); 
          if($sql1)
          {
            // echo "d";
            echo "<script>alert('Terima kasih konfirmasi pembayaran berhasil dilakukan, mohon bersabar. Kami akan memprosesnya.'); window.location = 'tiket.php?menu=2'</script>";
          }else{
            // echo "5";
          echo "<script>alert('Terjadi masalah pada sistem kami, mohon mengulangi beberapa saat lagi.'); window.location = 'tiket.php?menu=2'</script>";
          }
          
        } 
        else 
        { 
          // echo "e";
          echo "<script>alert('Terjadi masalah pada sistem kami, mohon mengulangi beberapa saat lagi.'); window.location = 'tiket.php?menu=2'</script>";
          
        }

    }

  }

 ?>