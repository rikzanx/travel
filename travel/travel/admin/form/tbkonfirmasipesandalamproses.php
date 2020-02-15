<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        Konfirmasi Pemesanan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Konfirmasi Pemesanan</a></li>
        <li class="active">Data Konfirmasi Pemesanan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Konfirmasi Pemesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                
<?php
include('../isi/koneksi/koneksi.php');
$a = !empty($_GET['a']) ? $_GET['a'] : "reset";
$no_resi = !empty($_GET['id']) ? $_GET['id'] : " "; 
$id_pesan = !empty($_GET['id']) ? $_GET['id'] : " ";   
$id_user = !empty($_GET['mem']) ? $_GET['mem'] : " ";     
//$kdb = koneksidatabase();
$a = @$_GET["a"];
$sql = @$_POST["sql"];
switch ($sql) {
    case "insert": sql_insert(); break;
    case "update": sql_update(); break;
    case "delete": sql_delete(); break;	
}

switch ($a) {
    case "reset" :  curd_read();   break;
    case "tambah":  curd_create(); break;	
    case "edit"  :  curd_update($no_resi); break;	
    case "hapus"  :  curd_delete($no_resi); break;  
	case "detail"  :  curd_detail($id_pesan,$id_user); break;  	
    default : curd_read(); break;
}

function curd_read()
{ 
  $hasil = sql_select();
  $i=1;
  ?>
  <!--<a href="index.php?form=16&a=tambah"class="btn btn-success btn-sm"><i class="fa fa-plus"></i> CREATE</a><br>-->
  Jumlah Record :		
<?php 
 global $kdb1;
 $per_hal=10;
 $jum  = "SELECT count(*) as total from konfirmasi_pesan, pesan where konfirmasi_pesan.id_pesan=pesan.id_pesan and status='Dalam Proses' ";		  
$result = mysqli_query($kdb1,$jum);
$out = mysqli_fetch_array($result);
$banyakData = $out[0];
echo $out[0];

$limit = 5;
?>
  <table class="table table-bordered table-striped ">
  <tr>
  <td>No</td>
  <td>No Resi</td>
  <td>No Rek</td>
  <td>Tgl Transfer</td>
  <td>Jam Transfer</td>
  <td>ID Pemesanan</td>
  <td>Status</td>
  <td>Harga</td>
  <td>Aksi</td>
  </tr>
  <?php
  while($baris = mysqli_fetch_array($hasil))
  {
  ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $baris['no_resi']; ?></td>
  <td><?php echo $baris['no_rek']; ?></td>
  <td><?php echo $baris['tgl_transfer']; ?></td>
  <td><?php echo $baris['jam_transfer']; ?></td>
  <td><?php echo $baris['id_pesan']; ?></td>
  <td><?php echo $baris['status']; ?></td>
  <td><?php echo $baris['harga']; ?></td>
  <td>

  <a href="index.php?form=16&a=edit&id=<?php echo $baris['no_resi']; ?>"class="btn btn-warning btn-sm">Update</a>
  </td>
  </tr>
  <?php
   $i++;  
  }
  ?>
  </table>  
 <ul class="pagination">			
			<?php 
			$banyakHalaman = ceil($banyakData / $limit);
			echo 'Page:<br> ';
			for($i=1;$i<=$banyakHalaman;$i++){
				
				?>
				<li><a href="index.php?form=16&page=<?php echo $i ?>"><?php echo $i ?></a></li>
				<?php	
				
			}
			?>						
		</ul>
   <?php
  mysqli_free_result($hasil);
}
 ?>

 
<?php 
function formeditor($row)
  {
?>
<table>
<td width="200px">Nomor Bangku</td>
<td> <input type = "text" name="nomor_bangku" id="nomor_bangku" maxlength="50" size="50" value="<?php  echo trim ($row["nomor_bangku"])?> " readonly/></td>
</tr>
<tr>
<td width="200px">Status Pembayaran</td>
<td> 
<?php  $status = str_replace('"', '"', trim($row["status"])); ?>
<input type="radio" name="status" id="status" value="Belum Bayar" <?php  if($status=='Belum Bayar' || $status=='') {echo "checked=\"checked\""; } else {echo ""; }  ?> />
<label>Belum Bayar</label><br>
<input type="radio" name="status" id="status" value="Dalam Proses" <?php  if($status=='Dalam Proses') {echo "checked=\"checked\""; } else {echo ""; } ?> />
<label>Dalam Proses</label><br>
<input type="radio" name="status" id="status" value="Lunas" <?php  if($status=='Lunas') {echo "checked=\"checked\""; } else {echo ""; } ?> />
<label>Lunas</label>
</td>
</tr>
<tr>
<td width="200px">Jadwal</td>
<td> <input type = "text" name="stasiun_asal" id="stasiun_asal" maxlength="22" size="22" value="<?php  echo trim ($row["nama_stasiun_asal"])?>"readonly/> -
<input type = "text" name="stasiun_tujuan" id="stasiun_tujuan" maxlength="22" size="22" value="<?php  echo trim ($row["nama_stasiun_tujuan"])?>"readonly/></td>
</tr>
<tr>
<td width="200px">User</td>
<td> <input type = "text" name="id_user" id="id_user" maxlength="50" size="50" value="<?php  echo trim ($row["username"])?>"readonly/></td>
</tr>
<tr>
<td width="200px">Tanggal</td>
<td> <input type = "text" name="tanggal" id="tanggal" maxlength="50" size="50" value="<?php  echo trim ($row["tanggal_berangkat"])?>"readonly/></td>
</tr>
<tr>
<td width="200px">Harga</td>
<td> <input type = "text" name="harga" id="harga" maxlength="50" size="50" value="<?php  echo trim ($row["harga"])?>"readonly/></td>
</tr>
</table>
-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<table>
<tr>
<td width="200px">No Resi</td>
<td><input type="text" name="no_resi" id="no_resi" maxlength="25" size="25" value="<?php  echo trim($row["no_resi"]) ?>" readonly/></td>
</tr>
<tr>
<td width="200px">ID Pesan</td>
<td><input type="text" name="id_pesan" id="id_pesan" maxlength="25" size="25" value="<?php  echo trim($row["id_pesan"]) ?>" readonly/></td>
</tr>
</table>
<?php  }?>
 
<?php 
function curd_create() 
{
?>
<h3>Penambahan Data Konfirmasi Pesan</h3><br>
<a href="index.php?form=16&a=reset" class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=16&a=reset" method="post">
<input type="hidden" name="sql" value="insert" >
<?php
$row = array(
"no_resi" => "",
  "id_pesan" => "",
  "publish" => "T");
formeditor($row)
?>
<p><input type="submit" name="action" value="Simpan"class="btn btn-primary btn-sm" ></p>
</form>
<?php } ?>

<?php 
function curd_update($no_resi) 
{
global $kdb1;
$hasil2 = sql_select_byid($no_resi);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Pengubahan Status Konfirmasi Pesan</h3><br>
<a href="index.php?form=16&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=16&a=reset" method="post">
<input type="hidden" name="sql" value="update" class="btn btn-primary btn-sm"> 
<input type="hidden" name="no_resix" value="<?php  echo $no_resi; ?>" >
<?php
formeditor($row)
?>
<p><input type="submit" name="action" value="Update" class="btn btn-primary btn-sm></p>
</form>
<?php } ?>

<?php 
function curd_delete($no_resi) 
{
global $kdb1;
$hasil2 = sql_select_byid($no_resi);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Penghapusan Data Konfirmasi Pesan</h3><br>
<a href="index.php?form=16&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=16&a=reset" method="post">
<input type="hidden" name="sql" value="delete" >
<input type="hidden" name="no_resix" value="<?php  echo $no_resi; ?>" >
<h3> Anda yakin akan menghapus data Konfirmasi Pesan dengan No Resi <b><?php echo $row['no_resi'];?> </b></h3>
<p><input type="submit" name="action" value="Update" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>
<?php
function curd_detail($id_pesan,$id_user) 
{
global $kdb1;
$hasil3 = sql_select_byid3($id_pesan,$id_user);
$row = mysqli_fetch_array($hasil3);
?>
<h3>Detail Data Pemesanan</h3><br>
<a href="index.php?form=16&a=reset" class="btn btn-primary btn-sm">Kembali</a>
<br>
<form action="index.php?form=16&a=reset" method="post">
ID Pesan = <?php echo $row['id_pesan'];?><br>
Nama Pemesan = <?php echo $row['nama_user'];?><br>
Nomor Telepon = <?php echo $row['no_telepon'];?><br>
Stasiun Keberangkatan  = <?php echo $row['nama_stasiun_asal'];?><br> 
Stasiun Tujuan = <?php echo $row['nama_stasiun_tujuan'];?><br> 
Harga Tiket = <?php echo $row['harga'];?><br>
Tanggal Berangkat = <?php echo $row['tanggal_berangkat'];?><br> 
Jam Berangkat = <?php echo $row['jam_berangkat'];?><br>  
Nomor bangku = <?php echo $row['nomor_bangku'];?><br> 
Status =<b> <?php echo $row['status'];?></b><br>
Nomor Resi =<b> <?php echo $row['no_resi'];?></b><br>

</form>
<?php } ?>

<?php 

function sql_select()
{
  global $kdb1;
  $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
  $limit = 5;
  $mulai_dari = $limit * ($page -1);
  $sql = " select * from konfirmasi_pesan, pesan, jadwal, stasiun_asal, stasiun_tujuan, user where konfirmasi_pesan.id_pesan = pesan.id_pesan
  and pesan.id_jadwal = jadwal.id_jadwal and pesan.id_user = user.id_user and jadwal.id_stasiun_asal = stasiun_asal.id_stasiun_asal
  and jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun_tujuan and status='Dalam Proses' limit $mulai_dari,$limit " ; 
  $hasil = mysqli_query($kdb1, $sql) or die(mysql_error());
  return $hasil;
}

function sql_insert()
{
  global $kdb1;
  global $_POST;
   if($_POST["id_pesan"]== "" || empty($_POST["id_pesan"])){ 
            echo " <div class='row'>
                    <div class='col-lg-12'>
                        <div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='fa fa-info-circle'></i>  <strong>Penambahan Gagal</strong> Harap isi semua form ! 
                        </div>
                    </div>
                </div>";
        }else {
  $sql  = " insert into `konfirmasi_pesan` (`id_pesan`,`no_resi`) values ( '".$_POST["id_pesan"]."', '".$_POST["no_resi"]."' )";			  
  mysqli_query($kdb1, $sql) or die( mysql_error()); 
}
}

function sql_select_byid3($id_pesan,$id_user)
{
  global $kdb1;
$sql =  "select * from konfirmasi_pesan, user, pesan, jadwal, stasiun_asal, stasiun_tujuan, kendaraan where 
kendaraan.id_mobil = jadwal.id_mobil and user.id_user = pesan.id_user and pesan.id_pesan = pesan.id_pesan and 
pesan.id_pesan = '$id_pesan' and user.id_user = '$id_user' and pesan.id_jadwal = jadwal.id_jadwal and jadwal.id_stasiun_asal = 
stasiun_asal.id_stasiun_asal and jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun_tujuan and konfirmasi_pesan.id_pesan = pesan.id_pesan" ; 
  //$sql = " select * from pesan where id_pesan = ".$id_pesan; 
  $hasil2 = mysqli_query($kdb1, $sql) or die(mysql_error());
  return $hasil2;
}
function sql_select_byid($no_resi)
{
  global $kdb1;
  $sql = " select * from konfirmasi_pesan,pesan, jadwal, stasiun_asal, stasiun_tujuan, user where konfirmasi_pesan.id_pesan = pesan.id_pesan
  and pesan.id_jadwal = jadwal.id_jadwal and pesan.id_user = user.id_user and jadwal.id_stasiun_asal = stasiun_asal.id_stasiun_asal
  and jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun_tujuan and no_resi = ".$no_resi; 
  $hasil2 = mysqli_query($kdb1, $sql) or die(mysql_error());
  return $hasil2;
}

function sql_update()
{
  global $kdb1;
  global $_POST; 
 $sql  = " update `pesan`, `konfirmasi_pesan` set 
  `status` = '".$_POST["status"]."' where konfirmasi_pesan.id_pesan = pesan.id_pesan and no_resi = ".$_POST["no_resix"];       
  mysqli_query($kdb1, $sql) or die( mysql_error()); 
}

function sql_delete()
{
  global $kdb1;
  global $_POST; 
  $sql  = " delete from `konfirmasi_pesan` where no_resi = ".$_POST["no_resix"];			  
  mysqli_query($kdb1, $sql) or die( mysql_error()); 
  
   $sql1  = " update `pesan`, `konfirmasi_pesan` set 
  `status` = 'Belum Bayar' where konfirmasi_pesan.id_pesan = pesan.id_pesan and no_resi = ".$_POST["no_resix"];       
  mysqli_query($kdb1, $sql1) or die( mysql_error()); 
}

?>
</div>
</div>
</div>
 </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      
        <!-- /.col -->
    
      <!-- /.row -->
    </section>
    <!-- /.content -->
<!-- script datatables -->
  