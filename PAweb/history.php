<?php
    require 'config.php';
    $id_user = $_COOKIE['id_user'];
    $result = mysqli_query($db, "SELECT * FROM checkout WHERE id_user='$id_user'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VTuber</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/solid.min.css">
    <link rel="stylesheet" href="stylebelanja.css">
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
                <i class="fa-solid fa-xmark" id="close"></i>
            </div>
            <i class="fa-solid fa-bars" id="bars"></i>
        </nav>
    </header>
    <main>
        <div class="head-table" id="tabletext">
            <h3>HISTORY PEMBELIAN</h3>
        </div>
        <div class="table" style="overflow-x:auto;">
            <table border="1">
                <tr>
                    <th>NO</th>
                    <th>Merk Gadget</th>
                    <th>Spesifikasi</th>
                    <th>Warna</th>
                    <th>Harga</th>
                    <th>Tanggal Release</th>
                    <th>Gambar Gadget</th>
                </tr>
                    <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                <tr>
                    <td><?=$i?></td>
                    <td><?=$row['merk']?></td>
                    <td><?=$row['spec']?></td>
                    <td><?=$row['warna']?></td>
                    <td><?=$row['harga']?></td>
                    <td><?=$row['rilis']?></td>
                    <td><img src="model/<?=$row['gambarhp']?>" alt="" width="100px"></td>
                    <!-- <td><a href="thanks.php?id=<?=$row['id']?>" ><i class="fa fa-shopping-cart" style="font-size:36px" id="cart" name='buy'></i></a></td> -->
                </tr>
                    <?php
                        $i++;
                    }
                    ?>

            </table>
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
    </footer>
</body>
<script src="script.js"></script>
</html>

