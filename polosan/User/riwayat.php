<?php include '../koneksi.php'; ?>
<?php $data = query("SELECT * FROM transaksi WHERE id_user = '{$_SESSION['id_user']}'"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    </head>
<body>
    <nav>
        <h1>Printer<span> Store</span></h1>
            <a href="keranjang.php">keranjang</a>
            <a href="riwayat.php">Riwayat</a>
            <a href="../logout.php">Logout</a>
    </nav>
    <h1 class="judul">Riwayat Pesanan Anda</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr class="atas">
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>Merk</th>
            <th>Tanggal Transaksi</th>
            <th>Jumlah Barang</th>
            <th>Total Harga</th>
            <th>Status</th>
        </tr>
        <?php 
        $no = 1;
        if(count($data) == 0){
            ?>
            <tr>
                <td colspan="7">Belum Ada Riwayat Belanja</td>
            </tr>
            <?php
        }else{
            foreach($data as $row){
                $nama = $row['id_user'];
                $pemesan = query("SELECT * FROM user WHERE id_user = '$nama'")[0];
                $iBarang = $row['id_barang'];
                $barang = query("SELECT * FROM barang WHERE id_barang = '$iBarang'")[0];
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pemesan['nama_user']; ?></td>
                    <td><?= $barang['nama_barang']; ?></td>
                    <td><?= $row['tgl_transaksi']; ?></td>
                    <td><?= $row['jmlh_barang']; ?></td>
                    <td>Rp. <?= number_format($row['total_harga']); ?> ,-</td>
                    <td><?php 
                        if($row['status'] == "proses"){
                            echo "Pesanan Masih Di Proses";
                        }else if($row['status'] == "verifikasi"){
                            echo "Pesanan Sudah Di Verifikasi";
                        }else{
                            echo "Pesanan Di Tolak";
                        }
                    ?></td>
                </tr>
                <?php
            }
        }
        
        ?>
    </table>
</body>
</html>