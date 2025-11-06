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
    <title>Tambah Product</title>
</head>
<body>
    <h3>Create Product</h3>
    <form action="" method="POST"enctype="multipart/form-data">
        <Table>
            <tr>
                <td>
                    Nama Product
                </td>
                <td>
                    <input type="text" name="nama" required>
                </td>
            </tr>
            <tr>
                <td>
                    Kategori
                </td>
                <td>
                    <select name="kategori" id="">
                        <option value="Elektronik">Elektronik</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Deskripsi
                </td>
                <td>
                    <textarea name="deskripsi" id="" ></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Jumlah
                </td>
                <td>
                    <input type="number" name="jumlah" required>
                </td>
            </tr>
            <tr>
                <td>
                    Harga
                </td>
                <td>
                    <input type="number" name="harga" required>
                </td>
            </tr>
            <tr>
                <td>
                    Upload Gambar
                </td>
                <td>
                    <input type="file" name="gambar" id="" accept="images/*">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Simpan" name="simpan">
                </td>
        </Table>
    </form>
    
    <?php
    
    if(isset($_POST['simpan'])){
        include "../koneksi.php";
        $nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
        $kategori = mysqli_real_escape_string($koneksi,$_POST['kategori']);
        $deskripsi = mysqli_real_escape_string($koneksi,$_POST['deskripsi']);
        $jumlah = mysqli_real_escape_string($koneksi,$_POST['jumlah']);
        $harga = mysqli_real_escape_string($koneksi,$_POST['harga']);


        $gambar = $_FILES['gambar'];  
        $nama_gambar = $gambar['name'];
        $size_gambar = $gambar ['size'];
        $target_file = 'images/'.$nama_gambar;
        if($size_gambar < 300000){
            if(move_uploaded_file($gambar['tmp_name'],$target_file)){
                $sql = "INSERT INTO product  VALUES (NULL,'$nama','$kategori','$deskripsi','$jumlah','$harga','$nama_gambar')";
                $query = mysqli_query($koneksi,$sql);
                if($query){
                    echo "Data Berhasil Disimpan";
                    ?>
                    <a href="produck.php">Lihat semua data</a>
                    <?php
                }
            }else{
                echo "Gagal Upload Gambar";
            }
        }else{
            echo "Ukuran Gambar Terlalu Besar";
        }

        // $sql = "INSERT INTO product (nama,kategori,deskripsi,jumlah,harga) VALUES ('$nama','$kategori','$deskripsi','$jumlah','$harga')";
        // $query = mysqli_query($koneksi,$sql);
        // if($query){
        //     echo "Data Berhasil Disimpan";
        //     header("Location:produck.php");
        // }else{
        //     echo "Data Gagal Disimpan";
        // }
    }
    ?>
</body>
</html>