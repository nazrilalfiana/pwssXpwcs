<?php
include "../koneksi.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM product WHERE id = $id";
    $query = mysqli_query(mysql: $koneksi, query: $sql);
    if($sql){
        echo "Data dengan id $id berhasil dihapus";
        header("Location:produck.php");
    }else{
        echo "Data Gagal Dihapus";
    }
}else{
    echo "<h1>not found</h1>";
} 
?>