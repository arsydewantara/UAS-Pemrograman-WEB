<?php
    if(isset($_SESSION['login'])){
        session_start();
        echo "<script>
                document.location.href = 'LandingPageUser.php'
            </script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAdd.css">
    <title>Login</title>
</head>
<body>
    <div class="form">
        <h3>LOGIN</h3><br>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Username</label><br>
            <input type="text" name="user" > <br><br>

            <label for="">Password</label><br>
            <input type="password" name="password" > <br><br>

            <button type="submit" name="login" class="submit">LOGIN</button>
        </form>
        <br>
        <p>
            Belum punya akun?
            <a href='regis.php'>Daftar</a>
        </p>
        <p>
            Atau
        </p>
        <p>
            Anda seorang Admin?
            <a href="admin.php">Admin</a>
        </p>
    </div>
</body>
</html>

<?php
    session_start();
    require 'config.php';

    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $pwd = $_POST['password'];

        $sql = "SELECT * FROM user WHERE username = '$user'";
        $result = $db->query($sql);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $orang = $row['nama'];
            $iduser = $row['id'];

            if(password_verify($pwd, $row['pwd'])){
                $_SESSION['login'] = true;
                $_SESSION['nama'] = $orang;
                echo "<script>
                        document.cookie='id_user=$iduser';
                        alert('Selamat Datang $orang');
                        document.location.href = 'LandingPageUser.php';
                    </script>";
            }

            else{
                echo "<script>
                        alert('Username dan Password Salah');
                    </script>";
            }

        }else{
            echo "<script>
                    alert('Username tidak ada');
                </script>";
        }
    }

?>