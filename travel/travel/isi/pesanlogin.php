

            <div class="panel panel-default" style="color:black">
                <div class="panel-body">Peringatan pemesanan</div>
            </div>
                                                <div class="panel panel-primary">
                                                    <div class="panel-body" style="color:black;">
                                                        
                                                        
                                       <link href='style.css' rel='stylesheet' type='text/css'>
                                                        <div class="alert alert-warning" role="alert">Anda harus login terlebih dahulu untuk melakukan pemesanan</div>
                                                        
                                                        <?php
                                                    include "isi/koneksi/koneksi.php";
                                                    

                                                    if (isset($_POST['Login'])){
                                                        //koneksi terpusat
                                                        $idp = $_GET['idp'];
                                                        $username=$_POST['username'];
                                                        $password=md5($_POST['password']);
                                                        

                                                            $query=mysqli_query($kdb1,"select * from user where username= '$username' and password= '$password' ");
                                                            $cek=mysqli_num_rows($query);
                                                            

                                                            if($cek>0){
                                                                $row=mysqli_fetch_array($query);
                                                                $_SESSION['username']=$username;
                                                                $_SESSION['password']=$password;
                                                                ?><script language="javascript">document.location.href="tiket.php?menu=8&idp=<?php echo $idp; ?>";</script><?php

                                                            }else{
                                                                ?><script language="javascript">document.location.href="tiket.php?menu=13&status=Gagal Login&idp=<?php echo $idp; ?>";</script><?php
                                                            }		


                                                    }else{
                                                        unset($_POST['Login']);
                                                    }
                                                    ?>
                                    <form action="#" method="post">
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Username</label>
                                      <div class="col-xs-10">
                                        <input class="form-control" name="username" type="text" value="" placeholder="masukkan username" id="example-text-input">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">password</label>
                                      <div class="col-xs-10">
                                        <input class="form-control"  name="password" type="text" value="" placeholder="masukkan password" id="example-text-input">
                                      </div>
                                    </div>

                                    <div style="margin:3em;">
                                        <button type="submit" name="Login" class="btn btn-primary btn-md" data-loading-text="<i class='fa fa-spinner'></i> processing konfirmasi">login</button>
                                    </div>
                                   
                                    <div class="alert alert-danger" role="alert">belum punya akun
                                            <a href='tiket.php?menu=16&idp=1'>Buat akun</a></div>
                                </form>
                                                         
                                                        
                            
                                                        
                                                    </div>
                                                    </div>


