<?php
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_GET['id']) == false){
        echo"<script>window.location.href='produck.php';</script>";
    }
    include "koneksi.php";
    $id = mysqli_real_escape_string($koneksi,$_GET['id']);
    //proses edit data
    if(isset($_POST['simpan'])){    
        $nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
        $kategori = mysqli_real_escape_string($koneksi,$_POST['kategori']);
        $deskripsi = mysqli_real_escape_string($koneksi,$_POST['deskripsi']);
        $jumlah = mysqli_real_escape_string($koneksi,$_POST['jumlah']);
        $harga = mysqli_real_escape_string($koneksi,$_POST['harga']);
        
        $gambar = $_FILES['gambar'];  
        $nama_gambar = $gambar['name'];
        $size_gambar = $gambar ['size'];
        $target_file = 'images/'.$nama_gambar;
        if(is_uploaded_file($gambar['tmp_name']) == false){
            $sql = "UPDATE product SET nama='$nama', kategori='$kategori', deskripsi='$deskripsi', jumlah='$jumlah', harga='$harga' WHERE id=$id";
            $query = mysqli_query($koneksi,$sql);
            if($query){
                echo"<script>window.location.href='produck.php';</script>";
            }

    }else{
        if($size_gambar < 3000000) {
            if(move_uploaded_file($gambar['tmp_name'], $target_file)) {
                $sql = "UPDATE product SET nama='$nama', kategori='$kategori', deskripsi='$deskripsi', jumlah='$jumlah', harga='$harga', gambar='$nama_gambar' WHERE id=$id";
                $query = mysqli_query($koneksi,$sql);
                if($query){
                    echo"<script>window.location.href='produck.php';</script>";
                }
            } else {
                echo "Gagal mengupload gambar.";
            }
        }
    }
}
     //menampilkan data berdasarkan id
        $sql = "SELECT * FROM product WHERE id=$id";
        $query = mysqli_query($koneksi,$sql);
        $data = mysqli_fetch_array($query);
        ?>
        <h3>Edit Produk</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
            <tr>
                <td>Nama Produk</td>
                <td><input type="text" name="nama" id="" value="<?= $data['nama'] ?>"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <select name="kategori" id="">
                        <option value="elektronika" <?= $data['kategori'] == 'elektronika' ? 'selected' : '' ?>>Elektronik</option>
                        <option value="makanan" <?= $data['kategori'] == 'makanan' ? 'selected' : '' ?>>Makanan</option>
                        <option value="minuman" <?= $data['kategori'] == 'minuman' ? 'selected' : '' ?>>Minuman</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>
                   <textarea name="deskripsi" id=""><?= $data['deskripsi'] ?> </textarea>
                </td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>
                    <input type="number" name="jumlah" id="" value="<?= $data['jumlah'] ?>">
                </td>
            </tr>
            <tr>
             <td>Harga</td>
                <td>
                    <input type="number" name="harga" id="" value="<?= $data['harga'] ?>">
                </td>
            </tr>
            <tr>
                <td>Upload Gambar</td>
                <td>
                <?php 
                if ($data['gambar'] != ""){
                ?>
                    <img src="images/<?= $data['gambar'] ?>" alt="" width="100px">
                <?php
                }else{
                    echo "Gambar tidak tersedia";
                }
                ?>
                <br>
                <input type="file" name="gambar" id="" accept="images/*">
            </td>
            <tr>
                <td>
                    <a href="produck.php">
                        <input type="submit" value="UBAH" name="simpan">
                    </a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>