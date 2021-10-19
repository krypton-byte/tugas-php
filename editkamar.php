<?php
    $no_kamar = isset($_GET['no_kamar'])?$_GET['no_kamar']:"";
    $nm_kamar = isset($_GET["nm_kamar"])?$_GET["nm_kamar"]:"";
    $kelas = isset($_GET["kelas"])?$_GET["kelas"]:"";
    $tarif = isset($_GET["tarif"])?$_GET["tarif"] :""
?>
<h1>Edit Kamar</h1>
<form action="editkamar.php" method="post">
    No. Kamar: <?php echo $no_kamar?>
    <input type="hidden" name="no_kamar" value="<?php echo $no_kamar?>"><br/>
    Nama Kamar: 
    <input type="text" name="nm_kamar" value="<?php echo $nm_kamar?>"><br/>
    Kelas:
    <input type="text" name="kelas" value="<?php echo $kelas?>"><br/>
    Tarif:
    <input type="text" name="tarif" value="<?php echo $tarif?>"><br/>
    <input type="submit" value="Simpan"><input type="reset" value="Reset">
    </form>
    <a href="lihatkamar.php" target="main">Kembali Ke Lihat Kamar</a></p>
<?php
    if(isset($_POST["no_kamar"])){
        $no_kamar = $_POST["no_kamar"];
        $nm_kamar = $_POST["nm_kamar"];
        $kelas= $_POST["kelas"];
        $tarif = $_POST["tarif"];
        $conn = mysql_connect("localhost", "root","") or die(mysql_error());
        mysql_select_db("rekam_medik", $conn) or die(mysql_error());
        $sqlstr = "UPDATE kamar SET nm_kamar=\"$nm_kamar\",kelas=\"$kelas\",tarif=\"$tarif\" WHERE no_kamar=\"$no_kamar\"";
        if(!empty($no_kamar)){
            $hasil = mysql_query($sqlstr, $conn) or die(mysql_error());
            echo "Berhasil diedit";
            echo "<meta http-equiv=\"refresh\" content=\"2;lihatkamar.php?\">";
        }
    }
?>
    