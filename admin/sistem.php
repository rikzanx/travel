<?php
session_start();
$kdb1=mysqli_connect("localhost","root","","kereta_api") or die("Nggak bisa koneksi");
$nmuser = $_POST['email'];
$psw = md5($_POST['password']);
$op = $_GET['op'];
if($op=="in"){
    $sql = mysqli_query($kdb1,"SELECT * FROM admin WHERE email='$nmuser' AND password='$psw' ");
    $cek=mysqli_num_rows($sql);
    if($cek>0){
        $c = mysqli_fetch_assoc($sql);
        $_SESSION['email'] = $c['email'];
        $_SESSION['nama_lengkap'] = $c['nama_lengkap'];
            header("location:index.php");
    }else{
         die("email / password salah <a href=\"javascript:history.back()\">kembali</a>");
    }
}else if($op=="out"){
    unset($_SESSION['email']);
    header("location:index.php");
}
?>