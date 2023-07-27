<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Manajemen Perpustakaan</title>
    <link rel="stylesheet" href="./src/css/main.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

</head>

<body>
    <!-- Navbar -->
    <?php
    include "navbar.php";
    ?>
    <!-- Navbar End -->

    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1><b>SIMPERPUS</b></h1>
                    <h2>Sistem Informasi Manajemen Perpustakaan (Simperpus): Efisien, Terorganisir, dan Mudah Digunakan.</h2>
                    <div>
                        <div class="text-center text-lg-start">
                            <a href="./src/view/transaksi_lap.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Cetak Transaksi</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img">
                    <lottie-player src="./public/animation/hero.json" background="transparent" speed="1" autoplay></lottie-player>

                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->

    <footer>
        <hr>
        <p class="text-center"><b>Bismillah LULUS VSGA</b></p>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


</body>

</html>