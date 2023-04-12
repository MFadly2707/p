<?php 
    include '../koneksi.php';
    $id_barang = $_GET['id_barang'];
    $data = query("SELECT * FROM barang WHERE id_barang= '$id_barang'")[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Keranjang</title>
    </head>
<body>
    <div class="box">
        <H1>Edit Kuantitas Produk</H1>
        <form action="" method="POST">
            <input type="hidden" name="id_barang" value="<?= $id_barang; ?>">
            <input type="number" name="qty" id="qty" value="<?= $_SESSION['cart'][$_GET['id_barang']]; ?>" min="1">
            <button type="submit" name="edit">Edit</button>
        </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['edit'])){
    $id = $_POST["id_barang"];
    $qty = $_POST["qty"];
    if($qty > $data['stok_barang']){
        ?>
        <script>
            alert('Melebihi Batas Stok');
            window.location = 'keranjang.php';
        </script>
        <?php
    }else{
        $_SESSION["cart"][$id] = $qty;
        ?>
        <script>
            alert('Kuatitas Berhasil di ubah');
            window.location = 'keranjang.php';
        </script>
        <?php
        }
    }
    
?>