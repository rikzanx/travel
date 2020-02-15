<section class="content-header">
      <h1>
        Data Jadwal
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Jadwal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Jadwal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
<?php
include('../isi/koneksi/koneksi.php');
$a = !empty($_GET['a']) ? $_GET['a'] : "reset";
$id_jadwal = !empty($_GET['id']) ? $_GET['id'] : " ";   

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
    case "edit"  :  curd_update($id_jadwal); break;	
    case "hapus"  :  curd_delete($id_jadwal); break;  	
    default : curd_read(); break;
}


function curd_read()
{ 
  $hasil = sql_select();
  $i=1;
  ?>

  <a href="index.php?form=5&a=tambah" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> CREATE</a><br>
  <?php 
//mencari banyak data yang ada dalam tabel
echo "Jumlah Record :";
global $kdb1;
$per_hal=10;
$result="SELECT count(id_jadwal) from jadwal";
$sqli = mysqli_query($kdb1,$result);
$data=mysqli_fetch_array($sqli);
$banyakData = $data[0];
echo $data[0];

$limit = 5;
?>
<?php
  $hasil = sql_select();
  $i=1;
   //menampilkan data 
  ?>
  <table border="1px" class="table table-bordered">
  <tr>
  <td>No</td>
  <td>ID Jadwal</td>
  <td>Nama Kereta</td>
  <td>Stasiun Keberangkatan</td>
  <td>Stasiun Tujuan</td>
  <td>Tanggal</td>
  <td>Waktu</td>
  <td>Harga</td>
  <td>Kapasitas</td>
  <td>Sisa Kapasitas</td>
  <td>Aksi</td>
  </tr>
  <?php
  while($baris = mysqli_fetch_array($hasil))
  {
    $result1="SELECT count(*) from pesan,jadwal where pesan.id_jadwal = jadwal.id_jadwal and jadwal.id_jadwal =".$baris['id_jadwal'];
    $sqli1 = mysqli_query($kdb1,$result1);
    $booking=mysqli_fetch_array($sqli1);
    $sisa=$baris['kapasitas']-$booking[0];
  ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $baris['id_jadwal']; ?></td>
  <td><?php echo $baris['nama_kereta']; ?></td>
  <td><?php echo $baris['nama_stasiun_asal']; ?></td>
  <td><?php echo $baris['nama_stasiun_tujuan']; ?></td>
  <td><?php echo $baris['tanggal_berangkat']; ?></td>
  <td><?php echo $baris['jam_berangkat']; ?></td>
  <td><?php echo $baris['harga']; ?></td>
  <td><?php echo $baris['kapasitas']; ?></td>
  <td><?php echo $sisa; ?></td>
  <td>
  <a href="index.php?form=5&a=edit&id=<?php echo $baris['id_jadwal']; ?>"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>UPDATE</a>	
  <a href="index.php?form=5&a=hapus&id=<?php echo $baris['id_jadwal']; ?>"class="btn btn-danger btn-sm">DELETE</a>	
  </td>
  </tr>
  <?php
   $i++;  
  }
  ?>
  </table> 
  <!--membuat pagination-->
 <ul class="pagination">			
			<?php 
			$banyakHalaman = ceil($banyakData / $limit);
			echo 'Halaman:<br> ';
			for($i=1;$i<=$banyakHalaman;$i++){
				
				?>
				<li><a href="index.php?form=5&page=<?php echo $i ?>"><?php echo $i ?></a></li>
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
<tr>
<td width="200px">Stasiun Keberangkatan</td>
<td>
<select = name="id_stasiun_asal" id="id_stasiun_asal"> 
<?php
global $kdb1;
$sqlquery = "select `id_stasiun_asal`, `nama_stasiun_asal` from stasiun_asal ";
$hasilquery = mysqli_query($kdb1, $sqlquery) or die (mysql_error());
while ($baris = mysqli_fetch_assoc($hasilquery)) {
	$value = $baris["id_stasiun_asal"];
	$caption = $baris["nama_stasiun_asal"];
	if($row["id_stasiun_asal"]== $baris["id_stasiun_asal"])
	{$selectr = "selected";}
else {$selectr = "";}
?>
<option value= "<?php echo $value ?>" <?php echo $selectr?> >
&nbsp; <?php echo $caption; ?> &nbsp;
</option>
 <?php } ?>
</select>
</td>
</tr>
<tr>
<td width="200px">stasiun Tujuan</td>
<td> 
<select = name="id_stasiun_tujuan" id="id_stasiun_tujuan"> 
<?php
global $kdb1;
$sqlquery = "select `id_stasiun_tujuan`, `nama_stasiun_tujuan` from stasiun_tujuan ";
$hasilquery = mysqli_query($kdb1, $sqlquery) or die (mysql_error());
while ($baris = mysqli_fetch_assoc($hasilquery)) {
	$value = $baris["id_stasiun_tujuan"];
	$caption = $baris["nama_stasiun_tujuan"];
	if($row["id_stasiun_tujuan"]== $baris["id_stasiun_tujuan"])
	{$selectr = "selected";}
else {$selectr = "";}
?>
<option value= "<?php echo $value ?>" <?php echo $selectr?> >
&nbsp; <?php echo $caption; ?> &nbsp;
</option>
 <?php } ?>
</select>
</td>
</tr>
<tr>
<td width="200px">Tanggal Keberangkatan</td>
<td> <input type = "date" name="tanggal_berangkat" id="tanggal_berangkat" maxlength="50" size="50" value="<?php  echo trim ($row["tanggal_berangkat"])?>"></td>
</tr>
<tr>
<td width="200px">Waktu Keberangkatan</td>
<td> <input type = "time" name="jam_berangkat" id="jam_berangkat" maxlength="50" size="50" value="<?php  echo trim ($row["jam_berangkat"])?>"></td>
</tr>
<tr>
<td width="200px">Harga</td>
<td> <input type = "number" name="harga" id="harga" value="<?php  echo trim ($row["harga"])?>"></td>
</tr>
<tr>
<td width="200px">Nama Kereta</td>
<td>
<select = name="id_kereta" id="id_kereta">
<?php
global $kdb1;
$sqlquery = "select `id_kereta`, `nama_kereta` from kereta ";
$hasilquery = mysqli_query($kdb1, $sqlquery) or die (mysql_error());
while ($baris = mysqli_fetch_assoc($hasilquery)) {
	$value = $baris["id_kereta"];
	$caption = $baris["nama_kereta"];
	if($row["id_kereta"]== $baris["id_kereta"])
	{$selectr = "selected";}
else {$selectr = "";}
?>
<option value= "<?php echo $value ?>" <?php echo $selectr?> >
&nbsp; <?php echo $caption; ?> &nbsp;
</option>
 <?php } ?>
</select>
</td>
</tr>
<tr>
<td width="200px">Kapasitas</td>
<td> <input type = "number" name="kapasitas" id="kapasitas" value="<?php  echo trim ($row["kapasitas"])?>"></td>
</tr>
</table>
<?php  }?>
 
<?php 
function curd_create() 
{
?>
<h3>Penambahan Data Jadwal</h3><br>
<a href="index.php?form=5&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=5&a=reset" method="post">
<input type="hidden" name="sql" value="insert" >
<?php
$row = array(
    "nama_stasiun_asal" => "",
	"nama_stasiun_tujuan" => "",
	"tanggal_berangkat" => "",
	"jam_berangkat" => "",
	"harga" => "",
	"id_kereta" => "",
  "kapasitas" => "");
formeditor($row)
?>
<p><input type="submit" name="action" value="Simpan" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 
function curd_update($id_jadwal) 
{
global $kdb1;
$hasil2 = sql_select_byid($id_jadwal);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Pengubahan Data Jadwal</h3><br>
<a href="index.php?form=5&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=5&a=reset" method="post">
<input type="hidden" name="sql" value="update" >
<input type="hidden" name="id_jadwalx" value="<?php  echo $id_jadwal; ?>" >
<?php
formeditor($row)
?>
<p><input type="submit" name="action" value="Update" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 
function curd_delete($id_jadwal) 
{
global $kdb1;
$hasil2 = sql_select_byid($id_jadwal);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Penghapusan Data Jadwal</h3><br>
<a href="index.php?form=5&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=5&a=reset" method="post">
<input type="hidden" name="sql" value="delete" >
<input type="hidden" name="id_jadwalx" value="<?php  echo $id_jadwal; ?>" >
<h3> Anda yakin akan menghapus data Jadwal Keberangkatan <br> <?php echo $row['nama_stasiun_asal'];?> - <?php echo $row['nama_stasiun_tujuan'];?>. Pada Tanggal <?php echo $row['tanggal_berangkat'];?> </h3>
<p><input type="submit" name="action" value="Delete" ></p>
</form>
<?php } ?>

<?php 


function sql_select()
{
    global $kdb1;
   $where = ''; 
   if(isset($_GET['cari']) && $_GET['cari']){  
 $where .= " where nama_stasiun_tujuan like '%{$_GET['cari']}%'";  
}
  $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$limit = 5;
$mulai_dari = $limit * ($page -1);
  $sql =  "select * from jadwal, kereta, stasiun_asal, stasiun_tujuan where 
  jadwal.id_stasiun_asal = stasiun_asal.id_stasiun_asal and jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun_tujuan and 
  jadwal.id_kereta = kereta.id_kereta limit $mulai_dari,$limit " ; 
  $hasil = mysqli_query($kdb1, $sql) or die(mysql_error());
  return $hasil;
}

function sql_insert()
{
  global $kdb1;
  global $_POST; 
  $_POST["id_stasiun_asal"];
  $_POST["id_stasiun_tujuan"];
  $_POST["tanggal_berangkat"];
  $_POST["jam_berangkat"];
   $_POST["harga"];
   $_POST["id_kereta"];
   $_POST["kapasitas"];
  $sql  = " insert into `jadwal` (`id_stasiun_asal`,`id_stasiun_tujuan`,`tanggal_berangkat`,`jam_berangkat`, `harga`,
 `id_kereta`,`kapasitas`) 
  values ( '".$_POST["id_stasiun_asal"]."', 
  '".$_POST["id_stasiun_tujuan"]."',
  '".$_POST["tanggal_berangkat"]."',
  '".$_POST["jam_berangkat"]."',
  '".$_POST["harga"]."',
  '".$_POST["id_kereta"]."',
  '".$_POST['kapasitas']."' )";		  
  mysqli_query($kdb1, $sql) or die( mysql_error()); 
}

function sql_select_byid($id_jadwal)
{
  global $kdb1;
  $sql = "select * from jadwal,stasiun_asal,stasiun_tujuan where jadwal.id_stasiun_asal=stasiun_asal.id_stasiun_asal and jadwal.id_stasiun_tujuan=stasiun_tujuan.id_stasiun_tujuan and id_jadwal = ".$id_jadwal;
  $hasil2 = mysqli_query($kdb1, $sql) or die(mysql_error());
  return $hasil2;
}

function sql_update()
{
  global $kdb1;
  global $_POST; 
 $sql  = " update  `jadwal` set `id_stasiun_asal` = '".$_POST["id_stasiun_asal"]."',`id_stasiun_tujuan` = '".$_POST["id_stasiun_tujuan"]."',
  `tanggal_berangkat` = '".$_POST["tanggal_berangkat"]."',`jam_berangkat` = '".$_POST["jam_berangkat"]."',`harga` = '".$_POST["harga"]."',
  `id_kereta` = '".$_POST["id_kereta"]."' where id_jadwal = ".$_POST["id_jadwalx"];			  
  mysqli_query($kdb1, $sql) or die( mysql_error()); 		  
}

function sql_delete()
{
  global $kdb1;
  global $_POST; 
  $sql  = " delete from `jadwal` where id_jadwal = ".$_POST["id_jadwalx"];		  
  mysqli_query($kdb1, $sql) or die( mysql_error()); 
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