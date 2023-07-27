<?php
include "../../koneksi.php";

$id_anggota = $_POST['id_anggota'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$foto = (@$_POST['foto_lama']) ?: '';

if (@$_FILES['foto']['tmp_name']) {
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $dir = "public";
    move_uploaded_file($tmp, $dir . "../../../../public/" . $foto);
}

// Insert  
if (@$_POST) {

    $query = "INSERT INTO tb_anggota (id_anggota, nama, jenis_kelamin, alamat, foto) VALUES ('$id_anggota', '$nama', '$jenis_kelamin', '$alamat', '$foto')";
}

// Update
if (@$_POST['id']) {
    $query = "UPDATE tb_anggota SET 
                id_anggota = '$id_anggota', 
                nama = '$nama', 
                jenis_kelamin = '$jenis_kelamin', 
                alamat = '$alamat', 
                foto = '$foto' 
                    WHERE id = '$_POST[id]'";
}

// Delete
if (@$_GET['id']) {
    $query = "DELETE FROM tb_anggota WHERE id = '$_GET[id]'";
}

$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: ../view/anggota_read.php");
}
