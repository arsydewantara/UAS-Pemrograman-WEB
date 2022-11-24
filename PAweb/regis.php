<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAdd.css">
    <title>Registrasi</title>
</head>
<body>
    <div class="form">
        <h3>REGISTRASI</h3><br>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Nama Lengkap</label><br>
            <input type="text" name="nama_akun" id=""> <br><br>

            <label for="">Username</label><br>
            <input type="text" name="username" id=""> <br><br>

            <label for="">Password</label> <br>
            <input type="password" name="pwd" id=""> <br><br>

            <label for="">Konfirmasi Password</label><br>
            <input type="password" name="kpwd"><br><br>

            <button type="submit" name="regis" class="submit">DAFTAR</button>
        </form>
        <br>
        <p>
            Sudah punya akun?
            <a href='login.php'>Login</a>
        </p>
    </div>
</body>
</html>

<?php
    require 'config.php';

    if(isset($_POST['regis'])){
        $nama_akun = $_POST['nama_akun'];
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        $kpwd = $_POST['kpwd'];

        $sql = "SELECT * FROM user WHERE username='$username'";

        $akun = $db->query($sql);

        if(mysqli_num_rows($akun) > 0){
            echo "<script>
                    alert('Username telah digunakan orang lain!');
                    document.location.href ='regis.php';
                  </script>";
        }else{
            // konfirmasi password
            if ($pwd == $kpwd){

                $pwd = password_hash($pwd, PASSWORD_DEFAULT);

                $query = "INSERT INTO user (nama,username, pwd)VALUES ('$nama_akun', '$username', '$pwd')";

                $result = $db->query($query);

                if($result){
                    echo "<script>
                        alert('Registrasi Berhasil!');
                        document.location.href ='login.php';
                        </script>";
                }

                else{
                    echo "<script>
                        alert('Registrasi Gagal');
                        document.location.href ='regis.php';
                        </script>";
                }
            }
            else{
                echo "<script>
                    alert('Konfirmasi Password kurang tepat kawan!')
                    document.location.href ='regis.php';
                    </script>";
            }
        }
    }
?>