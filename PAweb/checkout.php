<?php
    session_start();
    if(!isset($_SESSION['login'])){
        echo "<script>
                alert('Harap login terlebih dahulu');
                document.location.href = 'login.php';
            </script>";
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
                    <li id="darkmode_id">DarkMode</li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="main-konten">
            <div class="konten1">
                <h1 id="slogan">SEE KINDS OF GADGET WE OFFER TO YOU!</h1>
                <p>Buy and see many varieties of gadgets
                    that you can buy and bring them home
                    for you to use!
                </p>
                <a class="order" href="formadd.php"><button>ORDER NOW</button></a>
                <a class="cart" href="talent.php"><button>SEE CART</button></a>
            </div>
            <div class="konten2">
                <img src="img/pict1.png" alt="maskot" id="phoneimg" height="300px">
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
    </footer>
</body>
<script src="script.js"></script>
</html>