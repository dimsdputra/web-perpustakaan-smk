<?php
require './login/koneksi.php';
//Ambil data siswa
$admin = ambil_data("SELECT * FROM user");
?>

<body>
    <div>
        <div class="bg-secondary">
            <div class="container pt-2 pb-2 pe-5 ps-5 text-light">
                <h1 class="m-0">Data Admin</h1>
            </div>
        </div>
        <div class="container ps-5 pe-5 pt-2 pb-2">
            <div class="mt-2">
                <?php foreach ($admin as $data_admin) : ?>
                    <tr>
                        <td class="table-secondary"><?= $data_admin["id"]; ?></td>
                    </tr>
                <?php endforeach; ?>
                <button type="button" class="btn" style="background-color: #00ADB5;"><a class="text-decoration-none d-block text-white" aria-current="page" href="http://localhost/web_dinamis/index.php?page=registrasi">Tambah Admin</a></button>
                <?php
                if (isset($_SESSION['registrasi'])) :
                ?>
                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                        <?php echo $_SESSION['registrasi']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION["registrasi"]);
                endif;
                ?>
            </div>
        </div>
    </div>
</body>