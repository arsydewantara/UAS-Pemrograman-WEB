<?php
    require 'config.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $result = mysqli_query($db, "SELECT * FROM barang WHERE id = '$id' ");
    $row = mysqli_fetch_array($result);

    if (isset($_POST['submit'])) {
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
            $update = mysqli_query($db, "UPDATE barang SET merk='$merk', spec='$spec', warna='$warna', harga='$harga',rilis='$rilis', gambarhp='$gambar_baru' WHERE id='$id' ");
            if ($update) {
                header("Location:crud.php");
            }else{
                echo "Gagal Update";
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Comptible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Gadget</title>
    <link rel="stylesheet" href="styleAdd.css">
</head>

<body>
    <div class="form">
        <h3>EDIT DATA GADGET</h3><br>
        <form action="" method="post" enctype="multipart/form-data">
        <label for="">Merk HP</label><br>
            <input type="text" name="merk" value=<?=$row['merk'];?>> <br><br>

            <label for="">Spesifikasi</label><br>
            <input type="text" name="spec" value=<?=$row['spec'];?>> <br><br>

            <label for="">Warna</label> <br>
            <input type="text" name="warna" value=<?=$row['warna'];?>> <br><br>

            <label for="">Harga</label><br>
            <input type="text" name="harga" value=<?=$row['harga'];?>><br><br>

            <label for="">Tanggal Release</label><br>
            <input type="date" name="rilis"><br><br>

            <label for="">Gambar HP</label><br>
            <input type="file" name="gambarhp"><br><br>

            <button type="submit" name='submit' class="submit">EDIT</button>
        </form>
    </div>
</body>

</html>