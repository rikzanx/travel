<?php
require('fpdf17/fpdf.php');


$pdf = new FPDF("P","cm","Letter");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../img/kereta-api-logo.png',1,1,3,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Res-train',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 085768047575',0,'L');    
$pdf->SetFont('Helvetica','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. Rejoso',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Website : rest-train.com Email : test@restrain.net',0,'L');
$pdf->Line(1,3.1,20,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,20,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(18,0.7,"-------------------------------- TIKET PEMESANAN --------------------------------",0,10,'C');
//$pdf->ln(1);
$pdf->SetFont('Helvetica','',10);
function koneksidatabase()
{
    include('koneksi/koneksi.php');
    return $kdb1;
}
$kdb1 = koneksidatabase();
$mem = $_GET['mem'];
$mes = $_GET['mes'];
$sql =  "select * from user, pesan, jadwal, stasiun_asal, stasiun_tujuan, kereta where kereta.id_kereta = jadwal.id_kereta and user.id_user = pesan.id_user and pesan.id_pesan = '$mem' and user.id_user = '$mes' and pesan.id_jadwal = jadwal.id_jadwal and jadwal.id_stasiun_asal = stasiun_asal.id_stasiun_asal and  jadwal.id_stasiun_tujuan = stasiun_tujuan.id_stasiun_tujuan" ; 
$hasil = mysqli_query($kdb1, $sql) or die(mysql_error());
while($baris = mysqli_fetch_array($hasil))
{
    $pdf->Image('http://localhost/travel/isi/barcode.php?f=png&s=ean-128&d=06543217',1,1,3,2);
    $pdf->Ln();
    $pdf->Cell(5,0.8,"ID Pemesanan        ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(5,0.8,$baris['id_pesan'],0,0,'L');
    $pdf->Ln();
    $pdf->Cell(5,0.8,"Nama Pemesanan        ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(5,0.8,$baris['nama_user'],0,0,'L');
    $pdf->Ln();
    $pdf->Cell(5,0.8,"Perjalanan      ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(3,0.8,$baris['nama_stasiun_asal'],0,0,'L');
    $pdf->Cell(0.2,0.8,"-",0,0,'L');
    $pdf->Cell(5,0.8,$baris['nama_stasiun_tujuan'],0,0,'L');
    $pdf->Ln();
    $pdf->Cell(5,0.8,"Tanggal Berangkat   ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(5,0.8,$baris['tanggal_berangkat'],0,0,'L');
    $pdf->Ln();
    $pdf->Cell(5,0.8,"Jam Berangkat         ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(5,0.8,$baris['jam_berangkat'],0,0,'L');
    $pdf->Ln();
    $pdf->Cell(5,0.8,"Nomor Kursi  ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(5,0.8,$baris['nomor_bangku'],0,0,'L');
    $pdf->Ln();
    $pdf->Cell(5,0.8,"Nama Kereta  ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(5,0.8,$baris['nama_kereta'],0,0,'L');
    $pdf->Ln();
    $pdf->Cell(5,0.8,"Total Bayar   ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(0.7,0.8,"Rp. ",0,0,'L');
    $pdf->Cell(1,0.8,$baris['harga'],0,0,'L');
    $pdf->Cell(2,0.8,",00 ",0,0,'L');
	$pdf->Ln();
	$pdf->Cell(5,0.8,"Note: Kereta dan nomor kursi dapat berubah sewaktu-waktu mohon kiranya agar maklum.Terimakasih.",0,0,'L');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(5,0,"------------------------------------------------------------------------------------------------------------------------ ( Gunting disini )",0,0,'L');
}

$pdf->Output("tiket.pdf","I");

?>

