
<?php
session_start();
$password = md5($_POST['password']);
$pass_baru = md5($_POST['pass_baru']);
$username = $_SESSION['username'];
  include "../isi/koneksi/koneksi.php";


	$query = "SELECT * FROM user where username='$username'";       
  $result = mysqli_query($kdb1,$query);
  while($tampil = mysqli_fetch_array($result)){
	
	 
      if(empty($_POST['pass_baru']) OR empty($_POST['password']))
      {
        echo "a";
        echo "<script>alert('Anda harus mengisikan semua data pada form Ganti Password.');
                  	window.location='javascript:history.go(-1)'
             		</script>";
      } 
      elseif($password==$tampil['password'])
      {
        echo "b";
        $updatepassword = "update user set password = '$pass_baru' where username = '$username'";
      $updatequery = mysqli_query($kdb1,$updatepassword)or die(mysql_error());
       echo "<script>alert('Password telah diganti');
                  	window.location='javascript:history.go(-1)'
             		</script>";
      }else{
        echo "c";
      	echo"
              	<script>alert('Password lama anda tidak sesuai, mohon ulangi lagi.');
                  	window.location='javascript:history.go(-1)'
             		</script>
          	";
      }
  }
                                                                     

?>