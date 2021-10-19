<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Dokter</title>
</head>
<body>
    <form action="inputdokter.php" method="post">
        Kode Dokter: <input type="text" name="kd_dokter"><br>
        Nama Dokter: <input type="text" name="nm_dokter"><br>
        Alamat: <input type="text" name="alamat" size="55" maxlength="50"><br>
        <input type="submit" value="simpan">
        <input type="reset" value="reset">
    </form>
    <p><a href="menu1.php" target="main">Kembali Ke Menu Dokter</a></p>
</body>
</html>
<?php
if(isset($_POST['kd_dokter'])){
    $kd_dokter=$_POST['kd_dokter'];
    $nm_dokter=$_POST['nm_dokter'];
    $alamat = $_POST['alamat'];
    $conn = mysql_connect("127.0.0.1", "root","") or die(mysql_error());
    mysql_select_db("rekam_medik", $conn) or die(mysql_error());
    $sqlstr = "INSERT INTO dokter values ('$kd_dokter','$nm_dokter','$alamat')";
    if(!empty($kd_dokter)){
        $hasil = mysql_query($sqlstr);
        echo 'berhasil disimpan';
    }
}

?>