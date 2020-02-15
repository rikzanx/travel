<section class="content-header">
      <h1>
        Data User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Pengguna</li>
        <li class="active">User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
<?php
include('../isi/koneksi/koneksi.php');
$a = !empty($_GET['a']) ? $_GET['a'] : "reset";
$id_user = !empty($_GET['id']) ? $_GET['id'] : " ";   
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
    case "edit"  :  curd_update($id_user); break;	
    case "hapus"  :  curd_delete($id_user); break;  	
    default : curd_read(); break;
}
  mysqli_close($kdb);

function curd_read()
{ 
  $hasil = sql_select();
  $i=1;
  ?>
  <a href="index.php?form=7&a=tambah" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>CREATE</a><br>
  Jumlah Record :		
<?php 
 global $kdb1;
 $per_hal=10;
 $jum  = "select count(id_user) from user";			  
$result = mysqli_query($kdb1,$jum);
$out = mysqli_fetch_array($result);
$banyakData = $out[0];
echo $out[0];

$limit = 5;
?>
  <table border="1px" class="table table-bordered">
  <tr>
  <td>No</td>
  <td>ID User</td>
  <td>Nama</td>
  <td>Alamat</td>
  <td>Telepon</td>
  <td>Username</td>
  <td>Password</td>
  <td>Aksi</td>
  </tr>
  <?php
  while($baris = mysqli_fetch_array($hasil))
  {
  ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $baris['id_user']; ?></td>
  <td><?php echo $baris['nama_user']; ?></td>
  <td><?php echo $baris['alamat']; ?></td>
  <td><?php echo $baris['no_telepon']; ?></td>
  <td><?php echo $baris['username']; ?></td>
  <td><?php echo $baris['password']; ?></td>
  <td>
  <a href="index.php?form=7&a=edit&id=<?php echo $baris['id_user']; ?>"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>UPDATE</a>	
  <a href="index.php?form=7&a=hapus&id=<?php echo $baris['id_user']; ?>"class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>DELETE</a>	
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
				<li><a href="index.php?form=7&page=<?php echo $i ?>"><?php echo $i ?></a></li>
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
  <input type="hidden" name="id_userx" value="<?php echo $_GET['id']; ?>">
<td width="200px">Nama</td>
<td> <input type = "text" name="nama" id="nama" maxlength="50" size="50" value="<?php  echo trim ($row["nama"])?>"></td>
</tr>
<tr>
<td width="200px">Alamat</td>
<td> <input type = "text" name="alamat" id="alamat" maxlength="50" size="50" value="<?php  echo trim ($row["alamat"])?>"></td>
</tr>
<tr>
<td width="200px">Telepon</td>
<td> <input type = "text" name="no_telepon" id="no_telepon" maxlength="8" size="8" value="<?php  echo trim ($row["no_telepon"])?>"></td>
</tr>
<tr>
</tr>
<tr>
<td width="200px">Username</td>
<td> <input type = "text" name="username" id="username" value="<?php  echo trim ($row["username"])?>"></td>
</tr>
<tr>
<td width="200px">Password</td>
<td> <input type = "text" name="password" id="password" maxlength="11" size="11" value="<?php  echo trim ($row["password"])?>"></td>
</tr>
</table>
<?php  }?>
 
<?php 
function curd_create() 
{
?>
<h3>Penambahan Data User</h3><br>
<a href="index.php?form=7&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=7&a=reset" method="post">
<input type="hidden" name="sql" value="insert" >
<?php
$row = array(
    "nama" => "",
	"alamat" => "",
	"no_telepon" => "",
	"username" => "",
	"password" => "" );
formeditor($row)
?>
<p><input type="submit" name="action" value="Simpan" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 
function curd_update($user) 
{
global $kdb1;
$hasil2 = sql_select_byid($user);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Pengubahan Dauser</h3><br>
<a href="index.php?form=7&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=7&a=reset" method="post">
<input type="hidden" name="sql" value="update" >
<input type="hidden" name="userx" value="<?php  echo $user; ?>" >
<?php
formeditor($row)
?>
<p><input type="submit" name="action" value="Update" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 
function curd_delete($id_user) 
{
global $kdb1;
$hasil2 = sql_select_byid($id_user);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Penghapusan Data user</h3><br>
<a href="index.php?form=7&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=7&a=reset" method="post">
<input type="hidden" name="sql" value="delete" >
<input type="hidden" name="id_userx" value="<?php  echo $id_user; ?>" >
<h3> Anda yakin akan menghapus data user <?php echo $row['nama_user'];?> </h3>
<p><input type="submit" name="action" value="Delete" class="btn btn-primary btn-sm" ></p>
</form>
<?php } ?>

<?php 

function sql_select()
{
  global $kdb1;
   $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$limit = 10;
$mulai_dari = $limit * ($page -1);
  $sql = " select * from user limit $mulai_dari,$limit " ;
  $hasil = mysqli_query($kdb1, $sql) or die(mysql_error());
  return $hasil;
}

function sql_insert()
{
  global $kdb1;
  global $_POST; 
  $_POST["nama"];
  $_POST["alamat"];
   $_POST["no_telepon"];
  $_POST["username"];
   $_POST["password"];
  $sql  = " insert into `user` (`no_telepon`,`nama_user`,`alamat`, `username`, `password`) 
  values ( '".$_POST["no_telepon"]."', 
  '".$_POST["nama"]."',
  '".$_POST["alamat"]."',
  '".$_POST["username"]."',
  '".$_POST["password"]."' )";			  
  mysqli_query($kdb1, $sql) or die( mysql_error()); 
}

function sql_select_byid($id_user)
{
  global $kdb1;
  $sql = " select * from user where id_user = ".$id_user; 
  $hasil2 = mysqli_query($kdb1, $sql) or die(mysql_error());
  return $hasil2;
}

function sql_update()
{
  global $kdb1;
  global $_POST; 
 $sql  = " update  `user` set `no_telepon` = '".$_POST["no_telepon"]."',`nama_user` = '".$_POST["nama"]."',`alamat` = '".$_POST["alamat"]."',`username` = '".$_POST["username"]."',
  `password` = '".$_POST["password"]."' where id_user = ".$_POST["id_userx"];			  
  mysqli_query($kdb1, $sql) or die( mysql_error()); 		  
}

function sql_delete()
{
  global $kdb1;
  global $_POST; 
  $sql  = " delete from `user` where id_user = ".$_POST["id_userx"];		  
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