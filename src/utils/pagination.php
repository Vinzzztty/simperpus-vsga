<nav class="float-end" aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        $jml_hal = ceil($jml / $batas);
        for ($i = 1; $i <= $jml_hal; $i++) {
            if ($i != $hal) {

        ?>
                <li class="page-item"><a class="page-link" href="anggota_read.php?hal=<?= $i ?>"><?= $i ?></a></li>
            <?php
            } else {
            ?>
                <li class="page-item"><a class="page-link disabled"><?= $i ?></a></li>
                <?php
                ?>
        <?php
            }
        }
        ?>
    </ul>
</nav>