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
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Halaman Admin</title>
    </head>
<body>
    <div class="sidebar">
        <h1>Printer Store</h1>
        <a href="index.php">Data Barang</a>
        <a>Dashboard</a>
        <a href="pesanan.php">Transaksi</a>
        <a href="../logout.php">Logout</a>
    </div>
    <div class="main">
        <h1>Selamat Datang Admin</h1>
        <h3>Dashboard</h3>

        <p class="tajuk">Pesanan Yang Sudah Di Proses</p>
        <table border="1" cellpadding="10" cellspacing="0" l>
            <tr class="atas">
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Nama Barang</th>
                <th>Tanggal Transaksi</th>
                <th>Jumlah Barang</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
            <?php 
            $no = 1;
            $data = query("SELECT * FROM transaksi WHERE NOT status LIKE '%proses%'");
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
                    <td><?php if($row['status'] == "verifikasi"){
                            echo "Pesanan Sudah Di Verifikasi";
                        }else{
                            echo "Pesanan Di Tolak";
                        }
                    ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>
</html>