<?php
$server = "localhost";  // hostname
$username = 'root'; // user pada mysql
$password = ""; // password mysql
$database = "simperpus_vsga2023"; // database yang dipilih

$koneksi = mysqli_connect($server, $username, $password, $database) or die('Gagal terhubung ke database');

// if($koneksi){
//     echo("Berhasil terhubung ke koneksi");
// }
