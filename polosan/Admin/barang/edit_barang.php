<?php
include '../../koneksi.php';
$id = $_GET['id_barang'];
$data = query("SELECT * FROM barang WHERE id_barang = '$id'")[0];

if (isset($_POST['submit'])) {
    if (editBarang($_POST) > 0) {
?>
        <script>
            alert("Barang Berhasi Diubah!!");
            window.location = '../index.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Barang Gagal Diubah!!");
            window.location = '../index.php';
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
    <title>Edit Barang</title>
    </head>

<body>
    <div class="box">
        <h1>Edit Barang</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_barang" value="<?= $data['id_barang']; ?>">
            <label for="">Nama Barang</label><br>
            <input type="text" name="nama_barang" value="<?= $data['nama_barang']; ?>"><br>
            <label for="">Jenis Barang</label><br>
            <input type="text" name="jenis_barang" value="<?= $data['jenis_barang']; ?>"><br>
            <label for="">Harga Satuan</label><br>
            <input type="number" name="harga_satuan" value="<?= $data['harga_satuan']; ?>"><br>
            <label for="">Stok Barang</label><br>
            <input type="number" name="stok_barang" value="<?= $data['stok_barang']; ?>"><br>
            <label for="">Foto Barang</label><br>
            <input type="file" name="foto" value="<?= $data['foto']; ?>" foto><br>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>