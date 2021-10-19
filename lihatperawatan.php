<?php
    $conn = mysql_connect("localhost","root","");
    mysql_select_db("rekam_medik",$conn);
    $hasil = mysql_query("SELECT perawatan.no_kamar, kamar.nm_kamar, perawatan.no_rm, pasien.nama, perawatan.kd_dokter, dokter.nm_dokter, perawatan.diagnosa FROM perawatan, kamar, dokter, pasien WHERE perawatan.no_kamar=kamar.no_kamar and perawatan.no_rm=pasien.no_rm and perawatan.kd_dokter=dokter.kd_dokter", $conn);
    $jumlah = mysql_num_rows($hasil);
    echo "<h3>Daftar Kamar</h3>
    Jumlah Kamar: $jumlah<br/>";
    echo "<table border='1'>";
    echo "<tr>
        <th>No.</th>
        <th>No.Kamar</th>
        <th>Nama Kamar</th>
        <th>No. RM</th>
        <th>Nama Pasien</th>
        <th>Kode Dokter</th>
        <th>Nama Dokter Perawatan</th>
        <th>Diagnosa</th>
        <th>Proses</th>
        </tr>";
    $a=1;
    while($baris = mysql_fetch_array($hasil)) {
        echo "<tr>
                <td>$a</td>
                <td>$baris[0]</td>
                <td>$baris[1]</td>
                <td>$baris[2]</td>
                <td>$baris[3]</td>
                <td>$baris[4]</td>
                <td>$baris[5]</td>
                <td>$baris[6]</td>
                <td><a href='?no_kamar=$baris[0]&no_rm=$baris[2]&kd_dokter=$baris[4]' target='main'>Hapus</a>
                </td>
                </tr>";
        $a++;
    }
    if(isset($_GET["no_kamar"])) {
        echo "</table>";
        $no_kamar = $_GET["no_kamar"];
        $no_rm = $_GET["no_rm"];
        $kd_dokter = $_GET["kd_dokter"];
        $sqlstr = "DELETE FROM perawatan WHERE no_kamar='$no_kamar' and no_rm='$no_rm' and kd_dokter='$kd_dokter'";
        if((!empty($no_kamar))&&(!empty($no_rm))&&(!empty($kd_dokter))) {
            $hasil = mysql_query($sqlstr, $conn) or die(mysql_error());
            echo "<meta http-equiv='refresh' content='2;?'>";
            echo 'Berhasil Dihapus';
        }
    }
    

?>
<p>
    <a href="menu4.php" target="main">Kembali Ke Menu Perawatan</a></p>