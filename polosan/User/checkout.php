<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    </head>

<body>
    <div class="box">
        <h2>Checkout</h2>
        <hr>
        <label for="">Tanggal Transaksi</label><br>
        <input type="date" name="tgl_transaksi" disabled value="<?= date('Y-m-d'); ?>">
        <?php foreach ($_SESSION["cart"] as $product_id => $kuantitas) : ?>
            <?php
            $data = query("SELECT * FROM barang WHERE id_barang = '$product_id'")[0];
            $subTotal = $data['harga_satuan'] * $kuantitas;
            ?>
            <form action="proses_checkout.php" method="post">
                <input type="hidden" name="tgl_transaksi" value="<?= date('Y-m-d'); ?>">
                <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">
                <input type="hidden" name="id_barang" value="<?= $product_id; ?>">

                <label for="">Nama Barang</label><br>
                <input type="text" name="nama_barang" value="<?= $data['nama_barang']; ?>" disabled><br>

                <label for="">Harga Satuan</label><br>
                <input type="number" name="harga_satuan" value="<?= $data['harga_satuan']; ?>" disabled><br>

                <label for="">Jumlah Barang</label><br>
                <input type="number" value="<?= $kuantitas; ?>" disabled><br>
                <input type="hidden" name="jmlh_barang" value="<?= $kuantitas; ?>">

                <label for="">Total Harga</label><br>
                <input type="number" name="total_harga" value="<?= $subTotal; ?>" disabled>
                <hr>
            <?php endforeach;  ?>
            <button type="submit" name="checkout">Checkout</button>
            </form>
    </div>
</body>

</html>