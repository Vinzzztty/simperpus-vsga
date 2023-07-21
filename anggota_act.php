<?php
include "koneksi.php";

$id_anggota = $_POST['id_anggota'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$foto = (@$_POST['foto_lama']) ?: '';

if (@$_FILES['foto']['tmp_name']) {
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $dir = "public";
    move_uploaded_file($tmp, $dir . "/" . $foto);
}

if (@$_GET['id']) {
    $id = $_GET['id'];
    // queary hapus data dari tabel tb_anggota
    $query = "DELETE FROM tb_anggota WHERE id = '$id' ";
} else if (@$_POST['id']) {
    $id = $_POST['id'];
    // Query edit data 
    $query = "UPDATE tb_anggota SET id_anggota = '$id_anggota' ,nama = '$nama',jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', foto = '$foto', WHERE id = '$id'";
}
// else {

//     $query = "INSERT INTO tb_anggota (id_anggota, nama, jenis_kelamin, alamat, foto) 
//                 VALUES ('$id_anggota', '$nama', '$jenis_kelamin', '$alamat', '$foto')";
// }

$result = mysqli_query($koneksi, $query);


if ($result) {
    header("Location: anggota_read.php");
}
