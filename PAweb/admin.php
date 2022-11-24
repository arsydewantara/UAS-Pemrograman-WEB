<?php
    if(isset($_SESSION['login'])){
        session_start();
        echo "<script>
                document.location.href = 'index.php'
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
    </div>
</body>
</html>

<?php
    session_start();
    require 'config.php';

    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $pwd = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE username = '$user'";
        $result = $db->query($sql);
        
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $orang = $row['nama'];

            if(password_verify($pwd, $row['pwd'])){
                $_SESSION['login'] = true;
                echo "<script>
                        alert('Selamat Datang $orang');
                        document.location.href = 'crud.php';
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