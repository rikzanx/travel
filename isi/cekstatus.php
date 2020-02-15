

            <div class="panel panel-default" style="color:black">
                <div class="panel-body">Data Status Bayar</div>
            </div>
              <div class="panel panel-primary" style="color:black;">
                  <table class="table table-hover">
                       <thead>
                           <tr>
                               <td>ID Pesan</td>
                               <td>Jurusan</td>
                               <td>Berangkat</td>
                               <td>Harga</td>
                               <td colspan="2">Status</td>
                               <td>Pembatalan</td>
                           </tr>
                       </thead>
                      <?php
                        $mem = $_SESSION['username'];
                          global $kdb1;
                          $per_hal=8;
                          $result="select count(id_pesan) from user, pesan, jadwal, stasiun_asal, stasiun_tujuan where 
                          												   user.id_user = pesan.id_user 
                          												   and user.username = '$mem' 
                          												   and pesan.id_jadwal = jadwal.id_jadwal 
                          												   and jadwal.id_stasiun_asal = stasiun_asal.id_stasiun_asal 
                          												   and  jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun_tujuan";
												  
                          $sqli = mysqli_query($kdb1,$result);
                          $data=mysqli_fetch_array($sqli);
                          $banyakData = $data[0];
                          $limit = 4;
                            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                          $mulai_dari = $limit * ($page -1);                                                   
                          $query1 = "select * from user, pesan, jadwal, stasiun_asal, stasiun_tujuan where 
                          					user.id_user = pesan.id_user 
                          					and user.username = '$mem' 
                          					and pesan.id_jadwal = jadwal.id_jadwal 
                          					and jadwal.id_stasiun_asal = stasiun_asal.id_stasiun_asal 
                          					and  jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun_tujuan 
                          					limit $mulai_dari,$limit";
                         $result=mysqli_query($kdb1,$query1) or die(mysql_error());
                                                        
                        while($row=mysqli_fetch_object($result))
                        { 
                          $id_pesan = $row -> id_pesan;
                               
                        ?>
                        <tbody>
                            
                             <tr>
                                 <td><span><?php echo $row -> id_pesan; ?></span></td>
                                 <td><span><?php echo $row -> nama_stasiun_asal; ?> - <?php echo $row -> nama_stasiun_tujuan; ?></span></td>
                                 <td><?php echo $row -> tanggal_berangkat; ?> | <?php echo $row -> jam_berangkat; ?></td>
                                 <td>Rp. <?php echo $row -> harga; ?> ,00</td>
                                 <td><?php 
                                            if ($row->status=="Belum Bayar") { 

                                              echo "<td align='center'><a href='tiket.php?menu=14&idp=$id_pesan' class=' btn btn-danger'>Belum Bayar</a>";
                                              }
                                            elseif ($row->status=="Dalam Proses" ) { 
                                              
                                              echo "<td align='center'><a href='#' class='btn btn-primary disabled'>Dalam Proses</a>";
                                              }
                                              else {
                                              
                                               echo "<td align='center'><a href='#' class='disabled btn btn-success'>Lunas</a>";
                                              } ?>
                                 </td>
                                 <td>
                                   <?php  if ($row->status=="Belum Bayar") { 
                                              echo"<a href='tiket.php?menu=11&idp=$id_pesan' class=' btn btn-warning'>Batal</a>";
                                              }?>

                                     </td>
                             </tr>
                         </tbody>
                       <?php } ?>
                                                         </table>
														 <div class="well well-sm">Pembatalan pemesanan hanya dapat dilakukan pada pemesanan yang belum dilakukan konfirmasi pembayaran<br>
														 Untuk melakukan konfirmasi pembayaran klik tombol <b style="color:red;">Belum Bayar</b></div>
														
                                                         <!--membuat pagination-->
 <div class="pagination">	
			<?php 
			$banyakHalaman = ceil($banyakData / $limit);
			echo 'Halaman:<br> ';
			for($i=1;$i<=$banyakHalaman;$i++){
				
				?>
				<li><a href="tiket.php?menu=2&page=<?php echo $i ?>"><?php echo $i ?></a></li>
				<?php	
				
												   } 
			?>					
		</div>
                                                </div>
												</div>
                                    