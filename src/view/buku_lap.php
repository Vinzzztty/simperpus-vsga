<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Manajemen Perpustakaan</title>
    <link rel="stylesheet" href="./src/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

</head>

<body>
    <?php
    require '../utils/navbar.php';
    ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-12 text-center mt-5">
                        <h1>Daftar Buku</h1>
                        <a href="buku_read.php" class="btn btn-primary mb-5 mt-4">Kembali</a>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-hover table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>ID Buku</th>
                                <th>Judul Buku</th>
                                <th>ISBN</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once "../../koneksi.php";

                            $query = "SELECT * FROM buku";

                            $result = mysqli_query($koneksi, $query);

                            if (!empty($result)) {

                                foreach ($result as $key => $row) {
                            ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['judul_buku'] ?></td>
                                        <td><?= $row['isbn'] ?></td>
                                        <td><?= $row['pengarang'] ?></td>
                                        <td><?= $row['penerbit'] ?></td>
                                        <td><?= $row['tahun'] ?></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "Belum ada data transaksi!";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        window.print();
    </script>
</body>

</html>