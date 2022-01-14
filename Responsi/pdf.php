<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'AGENDA KEGIATAN BOEDJANG COMZ',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'TAHUN 2021 - 2022',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'ID',1,0);
$pdf->Cell(50,6,'KEGIATAN',1,0);
$pdf->Cell(50,6,'MULAI',1,0);
$pdf->Cell(50,6,'SELESAI',1,1);
$pdf->SetFont('Arial','',10);
include 'config.php';
$jadwal = mysqli_query($koneksi, "select * from jadwal");
while ($row = mysqli_fetch_array($jadwal)){
 $pdf->Cell(20,6,$row['id'],1,0);
 $pdf->Cell(50,6,$row['kegiatan'],1,0);
 $pdf->Cell(50,6,$row['mulai'],1,0);
 $pdf->Cell(50,6,$row['selesai'],1,1);
}
$pdf->Output();
?>