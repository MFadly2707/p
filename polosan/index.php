<?php 
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printer Store</title>
    </head>
<body>
    <nav>
        <h1>Printer<span> Store</span></h1>
        <a href="login.php">
            <div class="login">Login</div>
        </a>
    </nav>
    <h1 class="np">Product</h1>
    <table border="1" cellpadding="10" cellspacing="0">
            <tr class="atas">
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $no = 1;
            $data = query("SELECT * FROM barang");
            foreach($data as $row){
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_barang']; ?></td>
                    <td>Rp. <?= number_format($row['harga_satuan']); ?> ,-</td>
                    <td><?= $row['stok_barang']; ?></td>
                    <td>
                    <a href="login.php" onclick="return confirm('Silahkan Login Terlebih dahulu!!!')">Detail</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
   </body>
</html>