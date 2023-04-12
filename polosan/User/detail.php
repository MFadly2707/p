<?php
include '../koneksi.php';
$id = $_GET['id_barang'];
$data = query("SELECT * FROM barang WHERE id_barang= '$id'")[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
    </head>

<body>
<nav>
        <h1>Printer<span> Store</span></h1>
            <a href="keranjang.php">keranjang</a>
            <a href="riwayat.php">Riwayat</a>
            <a href="../logout.php">Logout</a>
    </nav>
    <form action="" method="post">
        <div class="container">
            <div class="isi">
                <h1><?= $data["nama_barang"]; ?></h1>
                <h3>Rp. <?= number_format($data["harga_satuan"]); ?>,-</h3>
                <p>Tersisa <?= $data["stok_barang"]; ?> Stok</p>
                <label for="">Masukkan Jumlah Barang</label>
                <input type="number" name="qty" value="1" min="1">
                <button type="submit" name="pesan">Add To Cart</button>
            </div>
        </div>
    </form>
</body>

</html>

<?php
if (isset($_POST['pesan'])) {
    $qty = $_POST['qty'];
    if ($qty > $data['stok_barang']) {
?>
        <script>
            alert('Melebihi Batas Stok');
            window.location = 'index.php';
        </script>
    <?php
    }
    $_SESSION['cart'][$id] = $qty;
    ?>
    <script>
        alert("Barang Berhasil dimasukkan kedalam Keranjang!!!");
        window.location = 'keranjang.php';
    </script>
<?php
}
?>