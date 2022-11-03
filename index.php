<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="main-container row">
        <div class="col-2 p-0"><?php include("navbar.php") ?></div>
        <div class="content col-10 p-0">
            <div class="bg-secondary">
                <div class="container pt-2 pb-2 pe-5 ps-5 text-light">
                    <h1 class="fs-1">Dashboard</h1>
                </div>
            </div>
            <div class="container pt-2 pb-2 pe-5 ps-5">
                <?php
                    if (isset($_SESSION['login_success'])) :
                ?>
                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                        <?php echo $_SESSION['login_success']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION["login_success"]);
                    endif;
                ?>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-8 mt-2">
                        <div class="card text-center p-5">
                            <h1 class="fs-3 text-start">Sistem Informasi Perpustakaan <br> SMKN Mojoagung</h1>
                            <p class="mt-3 fs-6 text-start">Selamat datang di Website Perpustakaan SMKN Mojoagung. Website ini digunakan untuk peminjaman buku perpustakaan di SMKN Mojoagung berbasis digital.</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-4 mt-2">
                        <div class="card text-center p-5">
                            wkwk
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>