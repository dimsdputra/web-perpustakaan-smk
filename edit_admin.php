<?php
session_start();
require 'koneksi.php';

$id = $_GET["id"];

$admin = ambil_data("SELECT * FROM admin WHERE id = $id")[0];

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $check = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND id != $id");
    
    if(mysqli_num_rows($check) === 0) {
        if($_POST["password_baru"] !== "") {
            if (password_verify($_POST["password_lama"], $admin["password"])) {
                if ($_POST["password_baru"] === $_POST["konfir_password_baru"]) {
                    if(editAdmin($_POST, "with password") > 0) {
                        $_SESSION["admin_message"] = "Data admin ". $admin["nama"] ." berhasil diubah";
                        header("Location: daftar_admin.php");
                    }
                } else {
                    $password_error = true;
                }
            } else {
                $old_password_error = true;
            }
        } else {
            if(editAdmin($_POST, "without password") > 0) {
                $_SESSION["admin_message"] = "Data admin ". $admin["nama"] ." berhasil diubah";
                header("Location: daftar_admin.php");
            }
        }
    } else {
        $username_error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
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
                    <h1 class="">Edit Data Admin</h1>
                </div>
            </div>
            <div class="container pt-2 pe-5 ps-5">
               <div class="mt-2">
                    <?php
                        if (isset($_SESSION['message_fail'])) :
                     ?>
                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                            <?php echo $_SESSION['message_fail']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION["message_fail"]);
                        endif;
                    ?>
                </div>
            </div>
            <div class="container pb-2 pe-5 ps-5">
               <div class="">
                    <form action="" method="post">
                        <div class="card p-3">
                            <input type="hidden" name="id" id="id" value="<?= $admin["id"] ?>">
                            <div class="mb-3">
                                 <label for="nama" class="form-label">Nama</label>
                                 <input type="text" name="nama" id="nama" class="form-control" value="<?= $admin["nama"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control" value="<?= $admin["username"] ?>" required>
                                <?php if (isset($username_error)) : ?>
                                    <span style="color: coral; font-size: 12px;">Username sudah ada</span>
                                <?php endif; ?>
                            </div>


                            <p class="mt-5 text-secondary">Bila perlu, bisa mengganti password lama</p>
                            <div class="mb-3">
                                 <label for="password_lama" class="form-label">Password Lama</label>
                                 <input type="password" name="password_lama" id="password_lama" class="form-control" placeholder="In here...">
                                 <?php if (isset($old_password_error)) : ?>
                                      <span style="color: coral; font-size: 12px;">Password lama salah</span>
                                  <?php endif; ?>
                           </div>
                            <div class="mb-3">
                                <label for="password_baru" class="form-label">Password Baru</label>
                                <input type="password" name="password_baru" id="password_baru" class="form-control" placeholder="In here...">
                            </div>
                            <div class="mb-3">
                                <label for="konfir_password_baru" class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" name="konfir_password_baru" id="konfir_password_baru" class="form-control" placeholder="In here...">
                                <?php if (isset($password_error)) : ?>
                                    <span style="color: coral; font-size: 12px;">Password baru tidak sama</span>
                                <?php endif; ?>
                            </div>
                            <div>
                                <a href="daftar_admin.php" class="btn btn-secondary">Batal</a>
                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>