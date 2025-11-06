    <br>
    <h3>Login Admin</h3>
    <br>
    
    <form action="" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
           <tr>
            <td>
                <input type="submit" value="LOGIN" name="login">
            </td>
           </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['login'])){
        include "../koneksi.php";
        $username = mysqli_real_escape_string($koneksi,$_POST['username']);
        $password = mysqli_real_escape_string($koneksi,sha1($_POST['password']));

        $sql = "SELECT*FROM user WHERE username='$username' AND password='$password'";
        $query = mysqli_query($koneksi,$sql);
        if(mysqli_num_rows($query  ) > 0){
            $data = mysqli_fetch_array($query);
            $_SESSION['username'] = $data['username'];
            $_SESSION['nama'] = $data['nama'];
            header("location:index.php?page=produk");
        }else{
            echo "Login Gagal, username atau password salah!";
        }
    }
    ?>
