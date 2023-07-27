<?php

// require 'vendor/autoload.php';      
require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style;

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setCellValue('A1', 'Data Transaksi');

$activeWorksheet->setCellValue('A3', 'No');
$activeWorksheet->setCellValue('B3', 'Judul Buku');
$activeWorksheet->setCellValue('C3', 'Nama Anggota');
$activeWorksheet->setCellValue('D3', 'Tanggal Pinjam');
$activeWorksheet->setCellValue('E3', 'Tanggal Kembali');
$activeWorksheet->setCellValue('F3', 'Status');
include_once "../../koneksi.php";

$query = "SELECT * FROM transaksi
    JOIN buku ON buku.id = transaksi.buku
    JOIN tb_anggota ON transaksi.anggota = tb_anggota.id";

$data_transaksi = mysqli_query($koneksi, $query);

$baris = 4;
$no = 1;
foreach ($data_transaksi as $key => $value) {
    # code...
    $activeWorksheet->setCellValue('A' . $baris, $no);
    $activeWorksheet->setCellValue('B' . $baris, $value['judul_buku']);
    $activeWorksheet->setCellValue('C' . $baris, $value['nama']);
    $activeWorksheet->setCellValue('D' . $baris, $value['tanggal_pinjam']);
    $activeWorksheet->setCellValue('E' . $baris, $value['tanggal_kembali']);
    $activeWorksheet->setCellValue('F' . $baris, $value['status']);
    $baris++;
    $no++;
}

// Style tampilan spreadsheet
$styleArray = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => Style\Alignment::HORIZONTAL_CENTER,
    ],
];

$activeWorksheet->getStyle('A1:F1')->applyFromArray($styleArray); // Header row
$activeWorksheet->getStyle('A3:F3')->applyFromArray($styleArray); // Data column headers

// Membuat kolom untuk mudah dibaca
foreach (range('A', 'F') as $column) {
    $activeWorksheet->getColumnDimension($column)->setAutoSize(true);
}

$writer = new Xlsx($spreadsheet);
$writer->save('./hasil/laporan-transaksi.xlsx');
header('Location: ./hasil/laporan-transaksi.xlsx');

// Set headers to download the file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Send the file to the browser and stop further execution
readfile($filename);
exit();
