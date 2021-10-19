<html>
    <body> 
        <h1>Input Pasien</h1>
        <form action="inputpasien.php" method="post">
            No.RM Pasien : <input type="text" name="no_rm" size="15" maxlength="5"><br/>
            Nama Pasien : <input type="text" name="nama" size="45" maxlength="40"><br/>
            Alamat : <input type="text" name="alamat" size="55" maxlength="50"><br/>
            Telp : <input type="text" name="telp" size="13" maxlength="13"><br/>
            J.K Pasien : <input type="text" name="jk" size="13" maxlength="10"><br/>
            <input type="submit" value="Simpan"><input type="reset" value="Reset">
        </form>
        <p>
            <a href="menu2.php" target="main">Kembali Ke Menu Pasien</a>
        </p>
    </body>
</html>
<?php
if(isset($_POST['no_rm'])){
    $no_rm = $_POST["no_rm"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $telp = $_POST["telp"];
    $jk = $_POST["jk"];
    $conn = mysql_connect("127.0.0.1","root","") or die(mysq_error());
    mysql_select_db("rekam_medik", $conn) or die(mysql_error());
    $sqlstr = "INSERT INTO pasien VALUES ('$no_rm','$nama','$alamat','$telp','$jk')";
    if(!empty($no_rm)){
        $hasil = mysql_query($sqlstr, $conn) or die(mysql_error());
        echo "Berhasil Disimpan";
    }
}
?>