<?php
    $conn = mysql_connect("localhost","root","");
    mysql_select_db("rekam_medik", $conn);
    $hasil = mysql_query("select * from pasien", $conn);
    $jumlah = mysql_num_rows($hasil);
    echo "<h3>Daftar Dokter</h3> Jumlah Pasien : $jumlah<br/>";
    echo "<table border=\"1\">";
    echo "<tr><th>No.</th><th>No.Rm</th><th>nama</th><th>Alamat</th><th>Telp</th><th>J.K</th><th>Proses</th></tr>";
    $a=1;
    while($baris = mysql_fetch_array($hasil)){
        echo "<tr><td>$a</td><td>$baris[0]</td><td>$baris[1]</td><td>$baris[2]</td><td>$baris[3]</td><td>$baris[4]</td><td><a href=\"?no_rm=$baris[0]\">Hapus</a><a href=\"editpasien.php?no_rm=$baris[0]&nama=$baris[1]&alamat=$baris[2]&telp=$baris[3]&jk=$baris[4]\" target=\"main\"> Edit</a>";
        $a++;
    }
    echo "</table>";
    if(isset($_GET["no_rm"])){
        $no_rm = $_GET["no_rm"];
        $sqlstr = "DELETE FROM pasien WHERE no_rm=\"$no_rm\"";
        if(!empty($no_rm)){
            $hasil = mysql_query($sqlstr, $conn) or die (mysql_error());
            echo "<meta http-equiv=\"refresh\" content=\"2;?\">";
            echo "Berhasil Dihapus";
        }
    }
?>
<p><a href="menu2.php" target="main">Kembali Ke Menu Pasien</a></p>