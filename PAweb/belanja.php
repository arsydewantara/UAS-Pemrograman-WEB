<?php
    require 'config.php';
    

    $perpage = 5; //konten per halaman
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    // die("test...".$page);
    if(empty($page)){
        $mulai = 0;
        $page = 1;
    }else{
        $mulai = ($page-1) * $perpage;
    }

    $hal = "SELECT * FROM barang LIMIT $mulai, $perpage";

    $result = mysqli_query($db, "SELECT * FROM barang LIMIT $mulai, $perpage");

    $result2 = mysqli_query($db, "SELECT * FROM barang");

    $total = mysqli_num_rows($result2);
    
    $pages = ceil($total/$perpage);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
            <h3>DAFTAR GADGET YANG TERSEDIA</h3>
        </div>
        <?php
        
        ?>
        <div class="table" style="overflow-x:auto;">
            <table class="table table-dark" id="dtPg">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Merk Gadget</th>
                        <th>Spesifikasi</th>
                        <th>Warna</th>
                        <th>Harga</th>
                        <th>Tanggal Release</th>
                        <th>Gambar Gadget</th>
                        <th>Checkout</th>
                    </tr>
                </thead>
                <?php
                    $i = 1 +$mulai;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                <tbody>
                    <tr class="table-active">
                        <td><?=$i?></td>
                        <td><?=$row['merk']?></td>
                        <td><?=$row['spec']?></td>
                        <td><?=$row['warna']?></td>
                        <td><?=$row['harga']?></td>
                        <td><?=$row['rilis']?></td>
                        <td><img src="model/<?=$row['gambarhp']?>" alt="" width="70px"></td>
                        <td><a href="thanks.php?id=<?=$row['id']?>" ><i class="fa fa-shopping-cart" style="font-size:36px" id="cart" name='buy'></i></a></td>
                    </tr>
                </tbody>
                <?php
                    $i++;
                    }
                    ?>
            </table>
            
        </div>

        <div class="pagin">
            
        </div>
        
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for($o=1; $o<=$pages; $o++)
                    if($o != $page){
                        echo "<li class='page-item'><a class='page-link' href='belanja.php?halaman=$o'>$o</a></li>";
                    }else {
                        echo "<li class='page-item'><a class='page-link'> $o</a></li>";
                    } 
                
                
                ?>
            </ul>
        </nav>
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

