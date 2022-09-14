<?php
require './login/koneksi.php';

//Ambil data siswa
$siswa = ambil_data("SELECT * FROM siswa");
?>

<body>
    <div>
        <div class="bg-secondary">
            <div class="container pt-2 pb-2 pe-5 ps-5 text-light">
                <h1 class="m-0">Daftar Siswa</h1>
            </div>
        </div>
        <div class="container ps-5 pe-5 pt-2 pb-2">
            <div class="mt-2">
                <button type="button" class="btn" style="background-color: #00ADB5;"><a class="text-decoration-none d-block text-white" aria-current="page" href="http://localhost/web_dinamis/index.php?page=tambah_siswa">Tambah Data Siswa</a></button>
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
                            <th scope="col" class="table-secondary">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($siswa as $data_siswa) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td class="table-secondary"><?= $data_siswa["NIS"]; ?></td>
                                <td><?= $data_siswa["nama"]; ?></td>
                                <td><?= $data_siswa["kelas"]; ?></td>
                                <td><?= $data_siswa["jenis_kelamin"]; ?></td>
                                <td><?= $data_siswa["alamat"]; ?></td>
                                <td><a href="halaman/siswa/edit_siswa.php?id=<?= $data_siswa["id"] ?>">Ubah</a></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>