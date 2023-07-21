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
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <h1>Daftar Anggota</h1>
            </div>
        </div>
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "koneksi.php";

                    $query = "SELECT * FROM tb_anggota";

                    $result = mysqli_query($koneksi, $query);

                    foreach ($result as $key => $row) {
                    ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $row['id_anggota'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['jenis_kelamin'] ?></td>
                            <td><?= $row['alamat'] ?></td>

                            <?php
                            echo "<td><img src='public/" . $row['foto'] . "' width='100'></td>";
                            ?>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="./src/js/script.js"></script>
    <script>
        window.print()
    </script>


</body>

</html>