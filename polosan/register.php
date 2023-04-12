<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    if (tambahUser($_POST) > 0) {
        ?>
            <script>
                alert("Registrasi Berhasil, Silahkan Login!");
                window.location = 'login.php';
            </script>
        <?php
    } else {
        ?>
            <script>
                alert("Registrasi Gagal, Silahkan Coba Lagi!");
                window.location = 'register.php';
            </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    </head>
<body>
    <div class="box">   
        <h1>Register</h1>
        <form action="" method="post">
            <label for="nama_user">Nama Lengkap</label><br>
            <input type="text" name="nama_user" placeholder="Masukkan Nama Lengkap"><br>
            <label for="username">Username</label><br>
            <input type="text" name="username" placeholder="Masukkan Username"><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" placeholder="Masukkan Password"><br>
            <input type="hidden" name="role" value="2">
            <p>Sudah Memiliki Akun ? <a href="login.php">Login</a></p>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>