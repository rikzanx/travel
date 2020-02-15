

            <div class="panel panel-default" style="color:black">
                <div class="panel-body">Peringatan pemesanan</div>
            </div>

                                        <?php 
                                        include "isi/koneksi/koneksi.php";

                                            if(isset($_POST['daftar']))
                                            {
                                              $idp=$_GET['idp'];
                                              $nama=$_POST['nama_user'];
                                              $alamat=$_POST['email'];
                                              $no_telepon=$_POST['alamat'];
                                              $email=$_POST['no_telepon'];
                                              $username=$_POST['username'];
                                              $password=md5($_POST['password']);
                                              $select = mysqli_query($kdb1,"SELECT * FROM user where username = '$username' ");
                                              $num=mysqli_num_rows($select);
                                              if($num>0)
                                              {

                                                ?> <script language="javascript">document.location.href="index.php?menu=16&status=0&idp=<?php echo $idp; ?>";</script> <?php

                                              }else
                                              {
                                                $query = "INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_telepon`, `email`, `username`, `password`) VALUES (NULL, '$nama', '$alamat', '$no_telepon', '$email', '$username', '$password' )";
                                                $sql = mysqli_query($kdb1,$query);
                                                if($sql)
                                                {
                                                  $_SESSION['username']=$username;
                                                  $_SESSION['password']=$password;
                                                  ?> <script language="javascript">document.location.href="index.php?menu=8&idp=<?php echo $idp; ?>";</script> <?php
                                                }else
                                                {
                                                  ?> <script language="javascript">document.location.href="index.php?menu=16&idp=<?php echo $idp; ?>";</script> <?php
                                                }
                                              }
                                              
                                              

                                            }
                                         ?>
                                                <div class="panel panel-primary">
                                                    <div class="panel-body" style="color:black;">
                                                        
                                                        
                                       <link href='style.css' rel='stylesheet' type='text/css'>
                                        <div class="alert alert-warning" role="alert">New member</div>
                                        <?php 
                                          if(isset($_GET['status']))
                                          {
                                            echo '<div class="alert alert-danger" role="alert">Pakai Username lain</div>';
                                          }
                                         ?>
                                    <form action="#" method="post">
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Nama</label>
                                      <div class="col-xs-10">
                                        <input class="form-control" type="text" value="" name="nama_user" placeholder="budi" id="example-text-input">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Email</label>
                                      <div class="col-xs-10">
                                        <input class="form-control" type="text" name="email" value="" placeholder="Email" id="example-text-input">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Alamat</label>
                                      <div class="col-xs-10">
                                        <input class="form-control" name="alamat" type="text" value="" placeholder="lampung tengah" id="example-text-input">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">No Telepon</label>
                                      <div class="col-xs-10">
                                        <input class="form-control" type="text" name="no_telepon" value="" placeholder="0822-4261-5555" id="example-text-input">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Username</label>
                                      <div class="col-xs-10">
                                        <input class="form-control" type="text" name="username" value="" placeholder="budi" id="example-text-input">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">password</label>
                                      <div class="col-xs-10">
                                        <input class="form-control" type="password" name="password" value="" placeholder="Lampung123" id="example-text-input">
                                      </div>
                                    </div>

                                    <div style="margin:3em;">
                                        <button type="submit" class="btn btn-primary btn-md" name="daftar"  id="load" data-loading-text="<i class='fa fa-spinner'></i> processing konfirmasi">daftar</button>
                                    </div>
                                   
                                    <div class="alert alert-danger" role="alert">sudah punya akun
                                            <a href='../formRegistrasi3.php'>Login</a></div>
                                </form>
                                                         
                                                        
                            
                                                        
                                                    </div>
                                                    </div>


