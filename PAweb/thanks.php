<?php
    require 'config.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $sql = "SELECT * FROM barang WHERE id = '$id'";
    $result = $db->query($sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $merk = $row['merk'];
        $spec = $row['spec'];
        $warna = $row['warna'];
        $rilis = $row['rilis'];
        $harga = $row['harga'];
        $gambar = $row['gambarhp'];
        $id_user = $_COOKIE['id_user'];

        $query = "INSERT INTO checkout (merk,spec,warna, harga, rilis, gambarhp, id_user)
        VALUES ('$merk','$spec','$warna','$harga','$rilis','$gambar', '$id_user')";
        $hasil = $db->query($query);

        if($hasil){
            echo "<script> alert('Berhasil Membeli Barang!'); </script>";
        }else{
            echo "gagal kirim";
        }


    }else{
        echo "tidak ada barang yang dibeli";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VTuber</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header id ="Home">
        <nav>
            <a href="LandingPageUser.php"><img class="Logo" src="img/gadgetblack.png" alt="gadget" id="logo" height="73px"></a>
            <div class="navi" id="naviList">
                <ul id="listNav">
                    <li><a href="LandingPageUser.php">Home</a></li>
                    <li id="barang"><a href="belanja.php">GadgetList</a></li>
                    <li id="about_id"><a href="about.html">About Us</a></li>
                    <li id="akun_id"><a href="logout.php">Log out</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="main-konten">
            <div class="thanks">
                <h3>Terima Kasih telah membeli produk kami</h3><br>
                <p><?php print($merk) ?></p>
                <p><?php print($harga)?></p>
                <img src="model/<?=$row['gambarhp']?>"alt="" width="200px">
            </div>
        </div>
    </main>
    <footer>
        <ul id="footer_id">
            <li><a href="LandingPageUser.php">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <p class="hakcipta" id="hc">
            VTuber @ 2022
        </p>
        <div class="mode">
            <input type="checkbox" id="darkmode_id">
        </div>
    </footer>
</body>
<script src="script.js"></script>
</html>

