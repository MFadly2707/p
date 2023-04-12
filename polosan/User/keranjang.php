<?php
include '../koneksi.php';
if (empty($_SESSION["cart"]) || !isset($_SESSION["cart"])) {
?>
<script>
    alert("Barang Masih Kosong!!!");
    window.location = 'index.php';
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
    <title>Keranjang</title>
</head>

<body>
    <nav>
        <h1>Printer<span> Store</span></h1>
        <a href="keranjang.php">keranjang</a>
        <a href="riwayat.php">Riwayat</a>
        <a href="../logout.php">Logout</a>
    </nav>
    <h1 class="judul">Keranjang</h1>
    <div class="container">
        <?php
        $grandTotal = 0;
        foreach ($_SESSION['cart'] as $id_barang => $kuantitas) : ?>
        <?php
            $data = query("SELECT * FROM barang WHERE id_barang = '$id_barang'")[0];
            $totalHarga = $data['harga_satuan'] * $kuantitas;
            $grandTotal += $totalHarga;
            ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr class="atas">
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
                <th>Kuantitas</th>
                <th>Subtotal</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td><?= $data["nama_barang"]; ?></td>
                <td>Rp. <?= number_format($data["harga_satuan"]); ?>,-</td>
                <td><?= $kuantitas; ?></td>
                <td>Rp. <?= number_format($totalHarga); ?> ,-</td>
                <td>Rp. <?= number_format($grandTotal); ?>,-</td>
                <td>
                    <a href="edit_keranjang.php?id_barang=<?= $data['id_barang']; ?>" edit>Edit</a>
                    <a href="hapus_keranjang.php?id_barang=<?= $data['id_barang']; ?>" hapus>Hapus</a>
                </td>
            </tr>
        </table><br>
        <?php endforeach; ?>
    </div>
    <a href="checkout.php">Checkout</a>
</body>

</html>