<?php
    $kd_dokter = isset($_GET['kd_dokter'])?$_GET["kd_dokter"]:"";
    $nm_dokter = isset($_GET["nm_dokter"])?$_GET["nm_dokter"]:"";
    $alamat = isset($_GET["alamat"])?$_GET["alamat"]:"";
?>
<h1>Edit Dokter</h1>
<form action="editdokter.php" method="post">
    Kode Dokter: 
    <input type="hidden" name="kd_dokter" value="<?php echo $kd_dokter?>"><br/>
    Nama Dokter: 
    <input type="text" name="nm_dokter" value="<?php echo $nm_dokter?>"><br/>
    Alamat Dokter:
    <input type="text" name="alamat" value="<?php echo $alamat?>"><br/>
    <input type="submit" value="Simpan"><input type="reset" value="Reset">
    </form>
    <a href="lihatdokter.php" target="main">Kembali Ke Lihat Dokter</a></p>
<?php
    if(isset($_POST["kd_dokter"])){
        $kd_dokter = $_POST["kd_dokter"];
        $nm_dokter = $_POST["nm_dokter"];
        $alamat = $_POST["alamat"];
        $conn = mysql_connect("localhost", "root","") or die(mysql_error());
        mysql_select_db("rekam_medik", $conn) or die(mysql_error());
        $sqlstr = "UPDATE dokter SET nm_dokter=\"$nm_dokter\",alamat=\"$alamat\" WHERE kd_dokter=\"$kd_dokter\"";
        if(!empty($kd_dokter)){
            $hasil = mysql_query($sqlstr, $conn) or die(mysql_error());
            echo "Berhasil diedit";
            echo "<meta http-equiv=\"refresh\" content=\"2;lihatdokter.php?\">";
        }
    }
?>
    