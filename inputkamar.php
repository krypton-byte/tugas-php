<html>
    <body> 
        <h1>Input Kamar</h1>
        <form action="inputkamar.php" method="post">
            No.Kamar : <input type="text" name="no_kamar" size="15" maxlength="5"><br/>
            Nama Kamar : <input type="text" name="nm_kamar" size="45" maxlength="40"><br/>
            Kelas : <input type="text" name="kelas" size="15" maxlength="15"><br/>
            Tarif : <input type="text" name="tarif" size="15" maxlength="15"><br/>
            <input type="submit" value="Simpan"><input type="reset" value="Reset">
        </form>
        <p>
            <a href="menu3.php" target="main">Kembali Ke Menu Kamar</a>
        </p>
    </body>
</html>
<?php
if(isset($_POST['no_kamar'])){
    $no_kamar = $_POST["no_kamar"];
    $nm_kamar = $_POST["nm_kamar"];
    $kelas = $_POST["kelas"];
    $tarif = $_POST["tarif"];
    $conn = mysql_connect("127.0.0.1","root","") or die(mysq_error());
    mysql_select_db("rekam_medik", $conn) or die(mysql_error());
    $sqlstr = "INSERT INTO kamar VALUES ('$no_kamar','$nm_kamar','$kelas','$tarif')";
    if(!empty($no_kamar)){
        $hasil = mysql_query($sqlstr, $conn) or die(mysql_error());
        echo "Berhasil Disimpan";
    }
}
?>