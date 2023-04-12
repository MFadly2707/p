<?php
include '../../koneksi.php';
if (isset($_POST['submit'])) {
    if (tambahBarang($_POST) > 0) {
        ?>
            <script>
                alert("Barang Berhasi Ditambahkan!!");
                window.location = '../index.php';
            </script>
        <?php
    } else {
        ?>
            <script>
                alert("Barang Gagal Ditambahkan!!");
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
    <title>Tambah Barang</title>
    </head>

<body>
    <div class="box">
        <h1>Tambah Barang</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Nama Barang</label><br>
            <input type="text" name="nama_barang"><br>
            <label for="">Jenis Barang</label><br>
            <input type="text" name="jenis_barang"><br>
            <label for="">Harga Satuan</label><br>
            <input type="number" name="harga_satuan"><br>
            <label for="">Stok Barang</label><br>
            <input type="number" name="stok_barang"><br>
            <label for="">Foto Barang</label><br>
            <input type="file" name="foto" foto><br>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>