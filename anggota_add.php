<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Anggota - Simperpus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="./src/css/style.css" />
</head>

<body>
    <div class="container" id="anggota">
        <h1>Tambah Data Anggota</h1>

        <?php
        include_once 'koneksi.php';

        if (@$_GET['id']) {

            $id = $_GET['id'];
            $query = "SELECT * FROM tb_anggota WHERE id ='$id' ";
            $data_anggota = mysqli_query($koneksi, $query);
            $anggota = mysqli_fetch_array($data_anggota);
        }

        // echo $anggota['nama'];
        // exit;
        ?>

        <form action="anggota_act.php" method="POST" enctype="multipart/form-data">
            <div class="row mb-4">
                <label for="id_anggota" class="col-lg-2 col-form-label">ID Anggota: </label>
                <div class="col-lg-4">
                    <input type="text" name="id_anggota" id="id_anggota" class="form-control" value="<?= @$anggota['id_anggota'] ?>" />
                </div>
            </div>
            <div class="row mb-4">
                <label for="nama" class="col-lg-2 col-form-label">Nama Anggota: </label>
                <div class="col-lg-4">
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= @$anggota['nama'] ?>" />
                </div>
            </div>
            <div class="row mb-4">
                <label for="jenis_kelamin" class="col-lg-2 col-form-label">Jenis Kelamin: </label>
                <div class="col-lg-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" <?= (@$anggota['jenis_kelamin'] == 'L') ? 'checked' : '' ?> />
                        <label class="form-check-label" for="jenis_kelamin"> Laki-Laki </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioCheckedDisabled" value="P" <?= (@$anggota['jenis_kelamin'] == 'P') ? 'checked' : '' ?> />
                        <label class="form-check-label" for="flexRadioCheckedDisabled"> Perempuan </label>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <label for="alamat" class="col-lg-2 col-form-label">Alamat: </label>
                <div class="col-lg-4">
                    <input type="text" name="alamat" id="alamat" class="form-control" value="<?= @$anggota['alamat'] ?>" />
                </div>
            </div>
            <div class="row mb-4">
                <label for="foto" class="col-lg-2 col-form-label">Foto: </label>
                <div class="col-lg-4">
                    <?= (@$anggota['foto']) ? '<img src="public/' . $anggota['foto'] . ' "width="300" class="mb-3" />' : '' ?>
                    <input type="file" name="foto" id="foto" class="form-control" />
                    <input type="hidden" name="foto_lama" value="<?= @$anggota['foto'] ?>">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="anggota_read.php">Kembali</a>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="./src/js/script.js"></script>
</body>

</html>