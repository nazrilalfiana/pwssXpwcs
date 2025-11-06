<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="css/style.css">
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
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="hamburger">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </label>
            <ul>
                <li><a href="a">Home</a></li>
                <li><a href="b">Product</a></li>
                <li><a href="c">Content Us</a></li>
            </ul>
        </div>
        

    </div> 
    <div class="content" >
        <div class="container">
            <div class="row">
                <div class="banner">
                    <img class="images-banner" src="images/bner jpang.jpg" alt="">
                </div>
                <div class="row">
                    <div class="best-seller">
                        <h3>Best Seller</h3>
                        <div class="product">
                            <?php
                            include 'koneksi.php'; 
                            $sql = "SELECT * FROM product";
                            $query = mysqli_query($koneksi, $sql);
                            while($data = mysqli_fetch_array($query)){
                                ?>
                                <a href="pages/detail-product.php?id=<?=$data['id']?>">
                                <div class="product-item">
                                <img class = "images-product"src="images/<?=$data['gambar']?>" alt="">
                                <div class="Nama-product"><?=$data['nama']?></div>
                            </div>
                            </a>
                     
                                <?php
                            }
                            ?>
                            
                      
                            
                        </div>
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