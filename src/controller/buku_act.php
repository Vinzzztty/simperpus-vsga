<?php
require '../../koneksi.php';


$judul_buku = $_POST['judul_buku'];
$isbn = $_POST['isbn'];
$pengarang = $_POST['isbn'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];

/**
 * POST Insert
 */
if (@$_POST) {
    $query = "INSERT INTO buku (judul_buku, isbn, pengarang, penerbit, tahun)
              VALUES('$judul_buku', '$isbn', '$pengarang', '$penerbit', '$tahun')";
}

/**
 * POST Update
 */
if (@$_POST['id']) {
    $query = "UPDATE buku SET judul_buku = '$judul_buku', 
              isbn = '$isbn', pengarang = '$pengarang', penerbit = '$penerbit', tahun = '$tahun' WHERE id = '$_POST[id]'";
}

/**
 * DELETE
 */
if (@$_GET['id']) {
    $query = "DELETE FROM buku WHERE id = '$_GET[id]'";
}

$result = mysqli_query($koneksi, $query);

// Redirect ke buku_read.php
if ($result) {
    header("Location: ../view/buku_read.php");
}
