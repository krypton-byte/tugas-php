<?php
    $conn = mysql_connect("localhost","root","");
    mysql_select_db("rekam_medik", $conn);
    $hasil = mysql_query("select * from dokter", $conn);
    $jumlah = mysql_num_rows($hasil);
    echo "<h3>Daftar Dokter</h3> Jumlah Dokter : $jumlah<br/>";
    echo "<table border=\"1\">";
    echo "<tr><th>No.</th><th>Kode Dokter</th><th>Nama Dokter</th><th>Alamat</th><th>Proses</th>";
    $a=1;
    while($baris = mysql_fetch_array($hasil)){
        echo "<tr><td>$a</td><td>$baris[0]</td><td>$baris[1]</td><td>$baris[2]</td><td><a href=\"?kd_dokter=$baris[0]\" target=\"main\"> Hapus</a>|<a href=\"editdokter.php?kd_dokter=$baris[0]&nm_dokter=$baris[1]&alamat=$baris[2]\" target=\"main\">Edit</a></td></tr>";
        $a++;
    }
    echo "</table>";
    if(isset($_GET["kd_dokter"])){
        $kd_dokter = $_GET["kd_dokter"];
        $sqlstr = "DELETE FROM dokter WHERE kd_dokter=\"$kd_dokter\"";
        if(!empty($kd_dokter)){
            $hasil = mysql_query($sqlstr, $conn) or die (mysql_error());
            echo "<meta http-equiv=\"refresh\" content=\"2;?\">";
            echo "Berhasil Dihapus";
        }
    }
?>
<p><a href="menu1.php" target="main">Kembali Ke Menu Dokter</a></p>