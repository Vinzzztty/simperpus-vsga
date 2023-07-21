<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./src/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

</head>

<body>
    <div class="container">

        <h1>Form Transaksi</h1>
        <?php
        include_once "koneksi.php";
        $query_anggota = "SELECT * FROM tb_anggota";
        $data_anggota = mysqli_query($koneksi, $query_anggota);
        //print_r()

        $query_buku = "SELECT * FROM buku";
        $data_buku = mysqli_query($koneksi, $query_buku);

        ?>

        <form action="transaksi_act.php" method="POST">
            <div class="row">
                <label for="anggota" class="col-lg-2 col-form-label">Anggota</label>
                <select name="anggota" id="anggota">
                    <?php
                    foreach ($data_anggota as $key => $value) {

                    ?>
                        <option value="<?= $value['id'] ?>"><?= $value['nama'] ?> [ <?= $value['id_anggota'] ?> ]</option>
                    <?php
                    }

                    ?>
                </select>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="./src/js/script.js"></script>
</body>

</html>