<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Comptible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data Gadget</title>
    <link rel="stylesheet" href="styleAdd.css">
</head>
<body>
    <div class="form">
        <h3>TAMBAH DATA GADGET</h3><br>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Merk Gadget</label><br>
            <input type="text" name="merk" id=""> <br><br>

            <label for="">Spesifikasi</label><br>
            <input type="text" name="spec" id=""> <br><br>

            <label for="">Warna</label> <br>
            <input type="text" name="warna" id=""> <br><br>

            <label for="">Harga</label><br>
            <input type="text" name="harga"><br><br>

            <label for="">Tanggal Release</label><br>
            <input type="date" name="rilis"><br><br>

            <label for="">Gambar Gadget</label><br>
            <input type="file" name="gambarhp"><br><br>

            <button type="submit" name="submit" class="submit">TAMBAH</button>
        </form>
    </div>
</body>
</html>


<?php
    require 'config.php';

    if (isset($_POST['submit'])){
        $merk = $_POST['merk'];
        $spec = $_POST['spec'];
        $warna = $_POST['warna'];
        $harga = $_POST['harga'];
        $rilis = $_POST['rilis'];

        $gambarhp = $_FILES['gambarhp']['name'];
        $x = explode('.', $gambarhp);
        $ekstensi = strtolower(end($x));

        $gambar_baru = "$merk.$ekstensi";
        $tmp = $_FILES['gambarhp']['tmp_name'];

        if(move_uploaded_file($tmp, 'model/'.$gambar_baru)){
            $query = "INSERT INTO barang (merk,spec,warna, harga, rilis, gambarhp) VALUES ('$merk','$spec','$warna','$harga','$rilis','$gambar_baru')";
            $result = $db->query($query);

            if($result){
                header("Location:crud.php");
            }else{
                echo "gagal kirim";
            }
        }
    }
?>
