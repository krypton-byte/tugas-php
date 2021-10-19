<?php
    $conn = mysql_connect("localhost","root","");
    mysql_select_db("rekam_medik", $conn);
    $hasil = mysql_query("select * from kamar", $conn);
    $jumlah = mysql_num_rows($hasil);
    echo "<h3>Daftar Kamar</h3> Jumlah Kamar : $jumlah<br/>";
    echo "<table border=\"1\">";
    echo "<tr><th>No.</th><th>No. Kamar</th><th>Nama Kamar</th><th>Kelas</th><th>Tarif</th><th>Proses</th>";
    $a=1;
    while($baris = mysql_fetch_array($hasil)){
        echo "<tr><td>$a</td><td>$baris[0]</td><td>$baris[1]</td><td>$baris[2]</td><td>$baris[3]</td><td><a href=\"?no_kamar=$baris[0]\" target=\"main\"> Hapus</a>|<a href=\"editkamar.php?no_kamar=$baris[0]&nm_kamar=$baris[1]&kelas=$baris[2]&tarif=$baris[3]\" target=\"main\">Edit</a></td></tr>";
        $a++;
    }
    echo "</table>";
    if(isset($_GET["no_kamar"])){
        $no_kamar = $_GET["no_kamar"];
        $sqlstr = "DELETE FROM kamar WHERE no_kamar=\"$no_kamar\"";
        if(!empty($no_kamar)){
            $hasil = mysql_query($sqlstr, $conn) or die (mysql_error());
            echo "<meta http-equiv=\"refresh\" content=\"2;?\">";
            echo "Berhasil Dihapus";
        }
    }
?>
<p><a href="menu3.php" target="main">Kembali Ke Menu Kamar</a></p>