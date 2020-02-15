<div>   
    <div>

          
        <div class="panel panel-primary">
            <div class="panel-body" style="color:black;">
                
                <table class="table table-hover">
             <thead>
                 <tr>
                     <td>Jurusan</td>
                     <td>Tanggal/Jam Berangkat</td>
                     <td>Harga</td>
                     <td>Kursi tersedia</td>
                     <td>aksi</td>
                 </tr>
             </thead>
             <tbody>
              <?php
        require_once('koneksi/koneksi.php');
        $id_stasiun_asal= $_POST['carika'];
        $id_stasiun_tujuan= $_POST['carikt'];
        echo $tanggal= $_POST['caritgl'];
        $query = "select * from jadwal, kereta, stasiun_asal, stasiun_tujuan where  
                    kereta.id_kereta  = jadwal.id_kereta and 
                    jadwal.id_stasiun_asal = stasiun_asal.id_stasiun_asal and  
                    jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun_tujuan
                     and jadwal.id_stasiun_asal = '$id_stasiun_asal' and 
                     jadwal.id_stasiun_tujuan= '$id_stasiun_tujuan' and tanggal_berangkat= '$tanggal' ";
        $result=mysqli_query($kdb1,$query) or die(mysql_error());
        $no=1;
        while($row=mysqli_fetch_object($result)){ ?> 
                 <tr>
                     <td><h4><?php echo $row -> nama_stasiun_asal; ?> - <?php echo $row -> nama_stasiun_tujuan; ?></h4></td>
                     <td><?php echo $row -> tanggal_berangkat; ?> | <?php echo $row -> jam_berangkat; ?></td>
                     <td>Rp. <?php echo $row -> harga; ?> ,00</td>
                     <td><?php 
                           $id_jadwal = $row -> id_jadwal;              
                           $result2="SELECT count(id_pesan) from pesan where id_jadwal=$id_jadwal";
                           $sqli2 = mysqli_query($kdb1,$result2);
                           $data2=mysqli_fetch_array($sqli2);
                           $kapasitas = $row-> kapasitas;
                           $banyakData2 = $kapasitas-$data2[0];
                           echo $banyakData2;
                           ?>
                     </td>
                     <td><a href="tiket.php?menu=9&idp=<?php echo $row -> id_jadwal; ?>" class="btn btn-primary">
                        Lihat Detail
                    </a></td>
                 </tr>
            <?php } ?>
             </tbody>
         </table>
                
        </div>
            

            </div> 
            <!-- stop -->
        </div>
    </div>
</div>
</div>
