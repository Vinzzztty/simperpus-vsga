<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Manajemen Perpustakaan</title>
    <link rel="stylesheet" href="../css/main.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

</head>

<body>
    <!-- Navbar -->
    <?php
    include "../utils/navbar.php";
    ?>
    <!-- Navbar End -->

    <h1 class="d-flex justify-content-center">Daftar Anggota</h1>
    <div class="container">

        <a href="anggota_add.php" class="btn btn-primary">Tambah Anggota</a>
        <a href="anggota_lap.php" class="btn btn-warning">Cetak Laporan</a>
        <form class="row" method="POST">
            <div class="col-lg-4 offset-lg-6">
                <input type="text" name="pencarian" class="form-control" />
            </div>
            <div class="col-lg-2">
                <button class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-12 mt-4">
                <div class="row">

                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>ID Anggota</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Foto</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once "../../koneksi.php";

                            // Pagination
                            $batas = 5;
                            extract($_GET);

                            if (empty($hal)) {
                                $posisi = 0;
                                $hal = 1;
                                $no = 1;
                            } else {
                                $posisi = ($hal - 1) * $batas;
                                $no = $posisi + 1;
                            }

                            if (@$_POST['pencarian']) {
                                $pencarian = trim(mysqli_escape_string($koneksi, $_POST['pencarian']));

                                if ($pencarian != "") {

                                    $query = "SELECT * FROM tb_anggota
                                                  WHERE nama LIKE '%$pencarian%' 
                                                  OR id_anggota LIKE '%$pencarian%'
                                                  OR jenis_kelamin LIKE '%$pencarian%'
                                                  OR alamat LIKE '%$pencarian%'";
                                    $queryJumlah = $query;
                                } else {
                                    $query = "SELECT * FROM tb_anggota LIMIT $posisi, $batas";
                                    $queryJumlah = "SELECT * FROM tb_anggota";
                                }
                            } else {
                                $query = "SELECT * FROM tb_anggota LIMIT $posisi, $batas";
                                $queryJumlah = "SELECT * FROM tb_anggota";
                            }

                            $result = mysqli_query($koneksi, $query);

                            if (mysqli_num_rows($result) > 0) {

                                foreach ($result as $key => $row) {

                            ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $row['id_anggota'] ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['jenis_kelamin'] ?></td>
                                        <td><?= $row['alamat'] ?></td>

                                        <?php
                                        echo "<td><img src='../../public/" . $row['foto'] . "' width='100'></td>";
                                        ?>
                                        <td>
                                            <div class="btn-group">
                                                <a href="anggota_add.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                                                <a href="../controller/anggota_act.php?id=<?= $row['id'] ?>" class="btn btn-danger">Hapus</a>
                                            </div>
                                        </td>

                                    </tr>
                                <?php
                                    $no++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td style="text-align: center; color: red; font-size: 120%" colspan="7">Data tidak ditemukan!</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <div class="float-start">
                        <?php
                        if (isset($_POST['pencarian'])) {
                            if ($_POST['pencarian'] != '') {
                                $jml = mysqli_num_rows(mysqli_query($koneksi, $queryJumlah));
                                echo '<p>Data hasil pencarian: ' . $jml . '</p>';
                            }
                        } else {
                            $jml = mysqli_num_rows(mysqli_query($koneksi, $queryJumlah));
                            echo '<p>Jumlah Data: ' . $jml . '</p>';
                        }
                        ?>
                    </div>
                    <?php include_once "../utils/pagination.php" ?>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <footer>
        <hr>
        <p class="text-center">Bismillah LULUS VSGA</p>
    </footer>

</body>

</html>