<?php
    $conn = mysql_connect('localhost','root','');
    mysql_select_db("rekam_medik", $conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Perawatan</title>
</head>
<body>
    <h1>Input Perawatan</h1>
    <form action="inputperawatan.php" method="post">
        Kamar: <select name="no_kamar" class="text2">
        <?php
            $hasil = mysql_query("SELECT no_kamar, nm_kamar FROM kamar", $conn);

            while($baris = mysql_fetch_array($hasil)) {
                echo "<option value='$baris[0]'>$baris[0] $baris[1]</option>";
            }
        ?>
        </select><br/>
        Pasien: <select name="no_rm" class="text2">
            <?php
                $hasil = mysql_query("SELECT no_rm, nama FROM pasien", $conn);

                while($baris = mysql_fetch_array($hasil)) {
                    echo "<option value='$baris[0]'>$baris[0] $baris[1]</option>";
                }
            ?>
            </select></br>
        Dokter Perawat: <select name="kd_dokter" class="text2">
                <?php
                    $hasil = mysql_query("SELECT kd_dokter, nm_dokter FROM dokter", $conn);

                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<option value='$baris[0]'>$baris[0] $baris[1]</option>";

                    }
                ?>
        Diagnosa: <input type="text" name="diagnosa" size="55" maxlength="80"><br/>
        <input type="submit" value="Simpan"><input type="reset" value="Reset">
    </form>
    <p></a href="menu4.php" target="main">Kembali Ke Menu Perawatan </a></p>
</body>
</html>
<?php
if(isset($_POST["kd_dokter"])){
    $kd_dokter = $_POST["kd_dokter"];
    $no_kamar = $_POST["no_kamar"];
    $no_rm = $_POST["no_rm"];
    $diagnosa = $_POST["diagnosa"];
    $sqlstr = "INSERT INTO perawatan VALUES ('$no_kamar','$no_rm','$kd_dokter','$diagnosa')";
    if((!empty($kd_dokter))&&(!empty($no_kamar))&&(!empty($no_rm))&&(!empty($diagnosa))) {
        $hasil = mysql_query($sqlstr, $conn) or die(mysql_error());
        echo 'berhasil disimpan';
    }
}
?>