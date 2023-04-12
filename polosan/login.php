<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    </head>
<body>
    <div class="box">   
        <h1>Login</h1>
        <form action="proses_login.php" method="post">
            <label for="username">Username</label><br>
            <input type="text" name="username" placeholder="Masukkan Username"><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" placeholder="Masukkan Password">
            <p>Belum Memiliki Akun ? <a href="register.php">Register</a></p>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>