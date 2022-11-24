<?php
    require 'config.php';
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
    <title>GadgetList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/solid.min.css">
    <link rel="stylesheet" href="stylebelanja.css">
</head>
<body>
<header id ="Home">
        <nav>
            <a href="crud.php"><img class="Logo" src="img/gadgetblack.png" alt="gadget" id="logo" height="73px"></a>
            <div class="navi" id="naviList">
                <ul id="listNav">
                    <li><a href="crud.php">Home</a></li>
                    <li id="akun_id"><a href="logout.php">Log out</a></li>
                </ul>
                <i class="fa-solid fa-xmark" id="close"></i>
            </div>
            <i class="fa-solid fa-bars" id="bars"></i>
        </nav>
    </header>
    <main>
        <div class="head-table">
            <h3>MANAGEMENT DATA GADGET</h3>
        </div>
        <nav>
            <button class="addbutton" id="tmbhbtn"><a href="formadd.php" style="text-decoration: none;">TAMBAH DATA</a></button>
            <form class="searchbar" method= "get" action="">
                <input type="text" name="keyword" id="keyword" placeholder="Search Bar" value="<?php if(isset($_GET['keyword'])){echo $_GET['keyword'];}?>">

                <button type="submit" class="searchbtn" name="search"><i class="fa fa-search"></i></button>
            </form>
        </nav>
        <div class="table" style="overflow-x:auto;">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Merk Gadget</th>
                    <th>Spesifikasi</th>
                    <th>Warna</th>
                    <th>Harga</th>
                    <th>Tanggal Release</th>
                    <th>Gambar Gadget</th>
                    <th>Modifikasi</th>
                    <th>Menghapus</th>
                </tr>
            </thead>
            <?php
                include "config.php";
                if(isset($_GET['keyword'])){
                    $cari = $_GET['keyword'];

                    $query = "SELECT * FROM barang WHERE merk LIKE '%".$cari."%' or spec LIKE '%".$cari."%' or warna LIKE '%".$cari."%'";
                } else {
                    $query = "SELECT * FROM barang";

                }
                $i = 1;
                $hasil = mysqli_query($db, $query);
                while ($row = mysqli_fetch_array($hasil)) {
                    ?>
            <tbody>
                <tr class="table-active">
                    <td><?=$i?></td>
                    <td><?=$row['merk']?></td>
                    <td><?=$row['spec']?></td>
                    <td><?=$row['warna']?></td>
                    <td><?=$row['harga']?></td>
                    <td><?=$row['rilis']?></td>
                    <td><img src="model/<?=$row['gambarhp']?>" alt="" id="gmbrhp"></td>
                    <td class="edit"><a href="editform.php?id=<?=$row['id']?>"><i class="fa-solid fa-pen"></i></a></td>
                    <td class="del"><a href="hapusform.php?id=<?=$row['id']?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            </tbody>
            <?php
                $i++;
            }
            ?>
        </table>
        </div>
    </main>
    <footer>
        <ul id="footer_id">
            <li><a href="crud.php">Home</a></li>
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

<?php
    if(isset($_GET['search'])){
        $keyword = $_GET['keyword'];

        $hasil = mysqli_query($db, "SELECT * FROM barang WHERE merk LIKE '%".$keyword."%' OR spec '%".$keyword."%' OR warna '%".$keyword."%'");
    } else {
        $hasil = mysqli_query($db, "SELECT * FROM barang");

    }

    $vtuber = [];

    while($row = mysqli_fetch_assoc($hasil)){
        $vtuber = $row;
    }

?>