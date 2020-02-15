   <?php
   		if(isset($_SESSION['username']))
   		{
   			$username=$_SESSION['username'];
   			$result1=mysqli_query($kdb1,"select * from user where username = '$username' ") or die(mysql_error());
	        while($row1=mysqli_fetch_object($result1))
	        {
       			$id_user=$row1->id_user;
       		} 
   		}else{
   			?> <script language="javascript">document.location.href="index.php?";</script> <?php
   		}
            $idp = $_GET['idp'];
             $query = "select * from jadwal, kereta, stasiun_asal, stasiun_tujuan where  
                    kereta.id_kereta  = jadwal.id_kereta and 
                    jadwal.id_stasiun_asal = stasiun_asal.id_stasiun_asal and  
                    jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun_tujuan
                     and jadwal.id_jadwal =".$idp;
            
            $result=mysqli_query($kdb1,$query) or die(mysql_error());
            while($row=mysqli_fetch_object($result))
               {
               	$nama_kereta=$row->nama_kereta;
               	$nama_stasiun_asal=$row->nama_stasiun_asal;
                $nama_stasiun_tujuan=$row->nama_stasiun_tujuan;
                $tanggal_berangkat=$row->tanggal_berangkat;
                $jam_berangkat=$row->jam_berangkat;
                $harga=$row->harga;
               } 
            ?>
  
     <div class="panel panel-default" style="color:black">
        <div class="panel-body">Input Data Pesan</div>
    </div>
        <div class="panel panel-primary">
            <div class="panel-body" style="color:black;">         
	                  <div class="row">
		                  	<div class="col-md-6">
	                            <hr>
	                            <p>  Nama Kereta            : <?php echo $nama_kereta; ?> </p>
	                            <p>  Stasiun Asal            : <?php echo $nama_stasiun_asal; ?> </p>
	                            <p>  Stasiun Tujuan          : <?php echo $nama_stasiun_tujuan; ?></p>
	                            <p>  Tanggal Berangkat       : <?php echo $tanggal_berangkat; ?></p>
	                            <p>  Jam Berangkat       : <?php echo $jam_berangkat; ?></p>
	                            <p>  Harga      : <?php echo $harga; ?>,00 idr</p>
	                            <br>
	                        </div>
	                        <div class="col-md-6">
	                            <hr>
	                            <img src="img/kereta-api-logo.png" width="200px" />
	                        </div>
	                  </div>
	                  <div class="row">
	                  	<div class="col-md-12 ">
	                                                <form action="tiket.php?menu=12&idp=<?php echo $idp; ?>" method="POST">
	                                                			<input type="hidden" name="id_jadwal" value="<?php 	echo $idp; ?>">
	                                                			<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                                                          		<div class="form-group row">
							                                      <label for="example-text-input" class="col-xs-2 col-form-label">Kode Bangku</label>
							                                      <div class="col-xs-10">
							                                        <select name="nomor_bangku" class="form-control" style="width: 100%;"> 
							                                        		  <?php 
							                                        		  	$query="select kapasitas from jadwal WHERE id_jadwal = ".$idp;
							                                        		  	$bang = mysqli_query($kdb1,$query);
							                                        		  	$bang= mysqli_fetch_assoc($bang);
							                                        		  	$bangku = $bang['kapasitas'];
							                                        		  	for ($i=1; $i <=$bangku ; $i++) { 
							                                        		  			$qry="select * FROM pesan WHERE id_jadwal = ".$idp." AND nomor_bangku = ".$i;
							                                        		  			$pilihpesan = mysqli_query($kdb1,$qry);
							                                        		  			$jumlahpesan =  mysqli_num_rows($pilihpesan);
							                                        		  			if($jumlahpesan>0)
							                                        		  			{
							                                        		  				?> <option value="<?php echo $i; ?>" disabled><?php echo $i; ?> (Sudah Terisi)</option> <?php
							                                        		  			}else
							                                        		  			{
							                                        		  				?> <option value="<?php echo $i; ?>"><?php echo $i; ?></option> <?php
							                                        		  			}
							                                        		  	}
							                                        		   ?>
							                                                  
							                                        </select>
							                                      </div>              
                                                        	    </div>
                                                        	    <input type="submit" name="submit" value="Pesan" class="btn btn-success">
                                                    </form>                                      
            			</div> 
	                  </div>
	         </div>
	    </div>
            
       
            
    



