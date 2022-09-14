<?php
require './login/koneksi.php';

if (isset($_POST["submit"])) {
    if (tambahBuku($_POST) > 0) {
        $_SESSION['berhasil'] = "Data Berhasil Ditambahkan";
        header("Location: http://localhost/web_dinamis/index.php?page=buku");
    }
}
?>

<body>
    <div>
        <div class="bg-secondary">
            <div class="container pt-2 pb-2 pe-5 ps-5 text-light">
                <h1 class="">Tambah Data Buku</h1>
            </div>
        </div>
        <div class="container pt-2 pb-2 pe-5 ps-5">
            <div class="mt-2">
                <?php
                if (isset($_SESSION['gagal'])) :
                ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                        <?php echo $_SESSION['gagal']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION["gagal"]);
                endif;
                ?>
                <form action="" method="post">
                    <div class="card p-3">
                        <div class="mb-3">
                            <label for="kode_buku" class="form-label">Kode Buku</label>
                            <input type="number" class="form-control" id="kode_buku" name="kode_buku" placeholder="1123" required>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Sebuah Seni Untuk Bersikap Bodo Amat" required>
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Mark Manson" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="2016" required>
                        </div>
                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Grasindo" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn text-light" style="background-color: #00ADB5;">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>