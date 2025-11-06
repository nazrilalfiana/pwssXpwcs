<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <form action=""method="Get">
        <input type="search" name="cari" id="">
        <input type="submit" value="Cari">
    </form>
    <br>
    <a href="index.php?page=create-produk">
        <button>Tambah Data Product</button>
        <br>
    </a>
    <br>
    <table border=2>
        <tr>
            <th>No</th>
            <th>Nama Produck</th>
            <th>kategori</th>
            <th>deskripsi</th>
            <th>jumlah</th>
            <th>harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
            </tr>
            <?php
            include "../koneksi.php";
            if(isset($_GET['cari'])){
                $cari =mysqli_real_escape_string($koneksi,$_GET['cari']);
                $sql = "SELECT*FROM product WHERE nama LIKE '%$cari%' OR kategori LIKE '%$cari%'";
            }else{
                $sql = "SELECT*FROM product";
            }
            $query = mysqli_query($koneksi,$sql);
            $no = 1;
            while($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?=$data ['nama']?></td>
                    <td><?=$data ['kategori']?></td>
                    <td><?=$data ['deskripsi']?></td>
                    <td><?=$data ['jumlah']?></td>
                    <td><?=$data ['harga']?></td>
                    <td>
                        <?php
                        if(file_exists(("images/".$data['gambar']))){
                            ?>
                            <img src="<?="images/".$data['gambar']?>" alt="" width="70px">
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <a href="delete_produk.php?id=<?=$data['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                       <a href="edit_produk.php?id=<?=$data['id']?>">Edit</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            
           
    </table>
   
</body>
</html>