<?php
require './login/koneksi.php';

//Ambil data siswa
$buku = ambil_data("SELECT * FROM buku");
?>

<body>
    <div>
        <div class="bg-secondary">
            <div class="container pt-2 pb-2 pe-5 ps-5 text-light">
                <h1 class="m-0">Daftar Buku</h1>
            </div>
        </div>
        <div class="container ps-5 pe-5 pt-2 pb-2">
            <div class="mt-2">
                <button type="button" class="btn" style="background-color: #00ADB5;"><a class="text-decoration-none d-block text-white" aria-current="page" href="http://localhost/web_dinamis/index.php?page=tambah_buku">Tambah Data Buku</a></button>
                <?php
                if (isset($_SESSION['berhasil'])) :
                ?>
                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                        <?php echo $_SESSION['berhasil']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION["berhasil"]);
                endif;
                ?>
            </div>
        </div>
        <div class="container ps-5 pe-5 pt-2 pb-2">
            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col" class="table-secondary">Kode Buku</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Penerbit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($buku as $data_buku) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td class="table-secondary"><?= $data_buku["kode_buku"]; ?></td>
                                <td><?= $data_buku["judul"]; ?></td>
                                <td><?= $data_buku["penulis"]; ?></td>
                                <td><?= $data_buku["tahun_terbit"]; ?></td>
                                <td><?= $data_buku["penerbit"]; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>