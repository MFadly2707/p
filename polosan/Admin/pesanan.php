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
        <a href="index.php">Data Barang</a>
        <a href="dashboard.php">Dashboard</a>
        <a>Transaksi</a>
        <a href="../logout.php">Logout</a>
    </div>
    <div class="main">
        <h1>Selamat Datang Admin</h1>
        <h3>Data Transaksi</h3>
        <!-- Proses -->
        <p class="tajuk">Pesanan Yang Harus Di Proses</p>
        <table border="1" cellpadding="10" cellspacing="0" p>
            <tr class="atas">
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Nama Barang</th>
                <th>Tanggal Transaksi</th>
                <th>Jumlah Barang</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $no = 1;
            $data = query("SELECT * FROM transaksi WHERE status LIKE '%Proses%'");
            foreach($data as $row){
                $nama = $row['id_user'];
                $pemesan = query("SELECT * FROM user WHERE id_user = '$nama'")[0];
                $barang = query("SELECT * FROM barang")[0];
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pemesan['nama_user']; ?></td>
                    <td><?= $barang['nama_barang']; ?></td>
                    <td><?= $row['tgl_transaksi']; ?></td>
                    <td><?= $row['jmlh_barang']; ?></td>
                    <td>Rp. <?= number_format($row['total_harga']); ?> ,-</td>
                    <td><?= $row['status']; ?></td>
                    <td>
                        <a href="verif.php?id_transaksi=<?= $row['id_transaksi']; ?>">Verif</a>
                        <a href="tolak.php?id_transaksi=<?= $row['id_transaksi']; ?>">Tolak</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>
</html>