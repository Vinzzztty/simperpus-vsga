<?php
include "../../koneksi.php";

$id_anggota = $_POST['anggota'];
$id_buku = $_POST['buku'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];


// Insert  
if (@$_POST) {
    $status = 'pinjam';

    $query = "INSERT INTO transaksi (anggota, buku, tanggal_pinjam, tanggal_kembali, status) 
                VALUES ('$id_anggota', '$id_buku', '$tanggal_pinjam', '$tanggal_kembali', '$status')";
}

if (@$_POST['id']) {
    $status = 'kembali';
    $query = "UPDATE transaksi SET 
                 anggota = '$id_anggota', 
                 buku = '$id_buku', 
                 tanggal_pinjam = '$tanggal_pinjam', 
                 tanggal_kembali = '$tanggal_kembali', 
                 status = '$status' 
                     WHERE id_transaksi = '$_POST[id]'";
}

if (@$_GET['id']) {
    $query = "DELETE FROM transaksi WHERE id_transaksi = '$_GET[id]'";
    header("Location: ../view/transaksi_read.php");
}

$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: ../view/transaksi_read.php");
}
