    <div class="panel panel-default" style="color:black">
        <div class="panel-body">Pemesanan Tiket Kereta Api Online</div>
    </div>
        <div class="panel panel-primary">
            <div class="panel-body" style="color:black;">
                <p class="lead">Selamat Datang di website <a target="_blank" href="#">Res-Train</a> Pemesanan Tiket Kereta Api Online. <br>
                    <div class="alert alert-info" role="alert">Cari Jadwal Keberangkatan Dengan Mudah</div>

                </p>
                <form action="tiket.php?menu=5" method="post">
                           <!-- <input class="form-control" type="text" name="carika"  maxlength="30" placeholder=" Kota Asal" /> -->
                            <div class="form-group row">
                              <label for="example-search-input" class="col-xs-2 col-form-label">Stasiun Asal</label>
                              <div class="col-xs-10">
                                 <select name="carika" class="form-control" style="width: 100%;"> 
                                     <?php
                                        $sqlquery   = "select id_stasiun_asal, nama_stasiun_asal from stasiun_asal ";
                                        $hasilquery = mysqli_query($kdb1, $sqlquery) or die (mysql_error());
                                        while ( $baris = mysqli_fetch_assoc($hasilquery)) { ?>
                                            <option value="<?php echo $baris['id_stasiun_asal']; ?>">
                                              <?php echo $baris['nama_stasiun_asal']; ?>
                                            </option>
                                        <?php }
                                    ?>
                                    
                                    
                                </select>
                              </div>
                            </div>
                            
                            
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Stasiun Tujuan</label>
                                      <div class="col-xs-10">
                                        <select name="carikt" class="form-control" style="width: 100%;"> 
                                            <?php
                                              $sqlquery   = "select id_stasiun_tujuan, nama_stasiun_tujuan from stasiun_tujuan ";
                                              $hasilquery = mysqli_query($kdb1, $sqlquery) or die (mysql_error());
                                              while ( $baris = mysqli_fetch_assoc($hasilquery)) { ?>
                                                  <option value="<?php echo $baris['id_stasiun_tujuan']; ?>">
                                                    <?php echo $baris['nama_stasiun_tujuan']; ?>
                                                  </option>
                                              <?php }
                                            ?> 
                                        </select>
                                      </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Tanggal</label>
                                      <div class="col-xs-10">
                                         <input class="form-control" type="date" name="caritgl"  maxlength="30" placeholder="" value="<?php echo date('Y-m-d'); ?>" />
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label" ></label>
                                      <div class="col-xs-10">
                                         <input  type="submit" class="btn btn-primary" value="Cari Jadwal" style="float:left;"/>
                                      </div>
                                    </div>
                </form>

            </div>
        </div>
