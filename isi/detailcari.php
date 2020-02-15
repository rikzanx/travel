
        <?php
            $idp = $_GET['idp'];
             $query1 = "select * from jadwal, kendaraan, kota_asal, kota_tujuan where  
			 kendaraan.id_mobil  = jadwal.id_mobil 
			 and jadwal.id_kota_asal = kota_asal.id_kota_asal and  
             jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan 
			 and jadwal.id_jadwal = ".$idp;
             $query = "select * from jadwal, kereta, stasiun_asal, stasiun_tujuan where  
                    kereta.id_kereta  = jadwal.id_kereta and 
                    jadwal.id_stasiun_asal = stasiun_asal.id_stasiun_asal and  
                    jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun_tujuan
                     and jadwal.id_jadwal =".$idp;

                                        
            
            $result=mysqli_query($kdb1,$query) or die(mysql_error());
            while($row=mysqli_fetch_object($result))
               {
            ?>
  
        <div class="panel panel-default" style="color:black">
        <div class="panel-body">Pilih Tujuan Anda</div>
    </div>
        <div class="panel panel-primary">
            <div class="panel-body" style="color:black;">
                
                <table class="table" >
             <thead>
                 <tr>
                 </tr>
             </thead>
             <tbody>
                 <tr style="width:400px;">
                     <td>
                         <p> Jurusan </p>
                         
                         <p>Tanggal Berangkat </p>
                         <p>Jam Berangkat</p>
                         <p>Harga  </p>
                         <p>Nama Kereta </p>
                         <p>Kursi tersedia</p>
                     </td>
                     <td>
                         <p><?php echo $row -> nama_stasiun_asal; ?> - <?php echo $row -> nama_stasiun_tujuan; ?></p>
                         
                        <p><?php echo $row -> tanggal_berangkat; ?></p>
                        <p><?php echo $row -> jam_berangkat; ?></p>
                        <p>Rp. <?php echo $row -> harga; ?> ,00</p>
                        <p><?php echo $row -> nama_kereta; ?></p>
                        <p>
                           <?php 
                           $id_jadwal = $row -> id_jadwal;              
                           $result2="SELECT count(id_pesan) from pesan where id_jadwal=$id_jadwal";
                           $sqli2 = mysqli_query($kdb1,$result2);
                           $data2=mysqli_fetch_array($sqli2);
                           $kapasitas = $row-> kapasitas;
                           $banyakData2 = $kapasitas-$data2[0];
                           echo $banyakData2;
                           ?>       
                        </p>
                 </tr>
             </tbody>
         </table>
          <?php 
          $id_jadwal =  $row -> id_jadwal;
            if(isset($_SESSION['username'])){
             echo "<a href='tiket.php?menu=8&idp=$id_jadwal' class='btn btn-primary btn-sm' value='Pesan'>Pesan</a>"; 
            }else{
             echo "<a href='tiket.php?menu=13&idp=$id_jadwal' class='btn btn-primary btn-sm' value='Pesan'>Pesan</a>
            ";
         }

           ?>   
        </div>
            <?php } ?>

            </div>
            
       
            
    </div>
</div>
</div>



