<?php           
 
$idj = $_GET['i'];
$querya = "select * from pesan, jadwal, user
            where 
            pesan.id_jadwal = jadwal.id_jadwal
            and pesan.id_user = user.id_user
            and pesan.id_pesan = ".$idj;

 $sql=mysqli_query($kdb1,$querya) or die(mysql_error());
 
  global $_POST; 

            ?>



            <div class="panel panel-default" style="color:black">
                <div class="panel-body">Data Pemesanan Tiket</div>
            </div>
                                                <div class="panel panel-primary">
                                                    <div class="panel-body" style="color:black;">
                                                        <!--<p>Anda telah berhasil melakukan pemesanan tiket dengan </p>
                                                       
                                                            <p>Order ID  :<span class="well well-sm"> <?php //echo $id_pesan ?></span></p>-->
                                                            <p> Anda telah berhasil melakukan pemesanan tiket. Silahkan melakukan pembayaran
                                                          ke Rekening BNI kami</p>
                                                            
                                                            <div class="media">
                                                              <div class="media-left media-middle">
                                                                <a href="#">
                                                                  <img class="media-object" src="img/bni.png" style="width:100px; heigth:auto;" alt="...">
                                                                </a>
                                                              </div>
                                                              <div class="media-body">
                                                                <p>Atas Nama : Muhammad Rikzan<br>
                                                                Nomor Rek. : xxxxxxx</p>
                                                              </div>
                                                            </div>
                                                            <div class="well">
															
                                                                <p>Anda memiliki waktu  paling lambat 1 jam sebelum jam kebrangkatan untuk melakukan pembayaran.<br>
                                                            Setelah <u>Pembayaran Selesai</u> Silahkan lakukan konfirmasi pembayaran
															dengan memasukkan Nomor Resi transfer pembayaran
                                                            pemesanan tiket travel di website kami. Terima Kasih</p>
                                                            </div>
                                                            
                                                            
                                                        
                                                            
                                                   
                                                        
                                                    </div>
                                                </div>
                        
 
                                    