<?php
    $no_rm = isset($_GET['no_rm'])?$_GET["no_rm"]:"";
    $nama = isset($_GET["nama"])?$_GET["nama"]:"";
    $alamat = isset($_GET["alamat"])?$_GET["alamat"]:"";
    $telp = isset($_GET["telp"])?$_GET["telp"]:"";
    $jk = isset($_GET["jk"])?$_GET["jk"]:"";
?>
<h1>Edit Pasien</h1>
<form action="editpasien.php" method="post">
    No. RM PAsien : <?php echo $no_rm?>
    <input type="hidden" name="no_rm" value="<?php echo $no_rm?>"><br/>
    Nama Pasien : 
    <input type="text" name="nama" value="<?php echo $nama?>"><br/>
    Alamat Pasien: 
    <input type="text" name="alamat" value="<?php echo $alamat?>"><br/>
    Telp: <input type="text" name="telp" value="<?php echo $telp?>"><br/>
    JK Pasien : <input type="text" name="jk" value="<?php echo $jk?>"><br/>
    <input type="submit" value="Simpan"><input type="reset" value="Reset">
    </form>
    <a href="lihatpasien.php" target="main">Kembali Ke Lihat Pasien</a></p>
<?php
    if(isset($_POST["no_rm"])){
        $no_rm = $_POST["no_rm"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $telp = $_POST["telp"];
        $jk = $_POST["jk"];
        $conn = mysql_connect("localhost", "root","") or die(mysql_error());
        mysql_select_db("rekam_medik", $conn) or die(mysql_error());
        $sqlstr = "UPDATE pasien SET nama=\"$nama\",alamat=\"$alamat\",telp=\"$telp\",jk=\"$jk\" WHERE no_rm=\"$no_rm\"";
        if(!empty($no_rm)){
            $hasil = mysql_query($sqlstr, $conn) or die(mysql_error());
            echo "Berhasil diedit";
            echo "<meta http-equiv=\"refresh\" content=\"2;lihatpasien.php?\">";
        }
    }
?>
    