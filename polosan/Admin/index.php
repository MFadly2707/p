<?php 
    include '../koneksi.php';
    if(!isset($_SESSION['status'])){
        ?>
        <script>
            alert('Silahkan Login Terlebih Dahulu!!!');
            window.location = '../index.php';
        </script>
        <?php
    }
    if($_SESSION['role'] != 'Admin'){
        ?>
        <script>
            alert('Anda Tidak Bisa Memasuki Halaman Admin!!!');
            window.location = '../index.php';
        </script>
        <?php
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    </head>
<body>
    <div class="sidebar">
        <h1>Printer Store</h1>
        <a>Data Barang</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="pesanan.php">Transaksi</a>
        <a href="../logout.php">Logout</a>
    </div>
    <div class="main">
        <h1>Selamat Datang Admin</h1>
        <h3>Data Barang</h3>
        <a href="barang/tambah_barang.php" class="add">Tambah Barang</a>
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
                        <a href="barang/edit_barang.php?id_barang=<?= $row['id_barang']; ?>">Edit</a>
                        <a href="barang/hapus_barang.php?id_barang=<?= $row['id_barang']; ?>" onclick="return confirm('Yakinn Mau Dihapus???');">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>
</html>