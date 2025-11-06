<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="header">
        <!-- container buat kata2 nya gak di pinggir -->
        <div class="container">   
            <h2>Toko Nazril</h2>
        </div> 
        
    </div>
    <div class="menu">
        <div class="container">
            <ul>
            <li><a href="a">Home</a></li>
            <li><a href="b">Product</a></li>
            <li><a href="c">Content Us</a></li>

        </ul>
        </div>
        <div class="content" >
            <div class="container">
             <div class="row">
                    <div class="detail-product">
                        <?php
                        include '../koneksi.php';
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM product WHERE id = $id";
                        $query = mysqli_query($koneksi, $sql);
                        $data = mysqli_fetch_array($query);
                        ?>
                        <img class="img-product" src="../images/<?=$data['gambar']?>" alt="">
                        <div class="diskripsi">
                            <h1><?=$data['nama']?></h1>
                            <h3>Stok : <?=$data['jumlah']?></h3>
                            <h3>Harga : <?=$data['harga']?></h3>
                            <h4>Deskripsi : <?=$data['deskripsi']?></h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="footer">
        <div class="container">
            <p>&copy; Toko Nazril</p>
        </div>
    </div>
</body>
</html>