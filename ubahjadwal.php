<?php 
if (isset($_GET['nrp'])) {
    $nrp = $_GET['nrp'];
} else {
    $nrp = null;
}
require_once('class/mahasiswa.php');
require_once('class/jadwal.php');
require_once('class/jamkuliah.php');
$objJamkuliah = new jamkuliah();
$objJadwal = new Jadwal();
$objMahasiswa = new mahasiswa();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="ubahjadwal_proses.php">
        <input type="hidden" name="nrp" <?php echo "value='".$nrp."'";?>>
        <p><label for=""> Mahasiswa : 
            <?php                 
            $res = $objMahasiswa->getMahasiswa($nrp);
            $row = $res->fetch_assoc();
            echo $row['nrp']." - ".$row['nama'];
            ?>
        </label>
            
        </p>
        <table border="1" style="min-width: 500px; max-width: 1000px;">
            <th>jam</th>
            <th>Minggu</th>
            <th>Senin</th>
            <th>Selasa</th>
            <th>Rabu</th>
            <th>Kamis</th>
            <th>Jumat</th>
            <th>Sabtu</th>
            <?php
        $arr = array(
            array(false, false, false, false, false, false, false,),
            array(false, false, false, false, false, false, false,),
            array(false, false, false, false, false, false, false,),
            array(false, false, false, false, false, false, false,),
            array(false, false, false, false, false, false, false,),
            array(false, false, false, false, false, false, false,),
            array(false, false, false, false, false, false, false,),
            array(false, false, false, false, false, false, false,),
            array(false, false, false, false, false, false, false,),
            array(false, false, false, false, false, false, false,),
            array(false, false, false, false, false, false, false,),
            array(false, false, false, false, false, false, false,)
        );
        $res2 = $objJadwal->getJadwal($nrp);
        $res3 = $objJamkuliah->getJam();
        while ($row = $res2->fetch_assoc()) {
            $arr[$row['idjam_kuliah'] - 1][$row['idhari'] - 1] = true;
        }
        $i = 0;
        while ($row2 = $res3->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row2["jam_mulai"] . "-" . $row2["jam_selesai"] . "</td>";
            for ($j = 0; $j <= 6; $j++) {
                if ($arr[$i][$j] == true) {
                    echo "<td><input type='checkbox' name='chk[]' value='$i.$j' checked></td>";
                } else {
                    echo "<td><input type='checkbox' name='chk[]' value='$i.$j'></td>";
                }
            }
            echo "</tr>";
            $i++;
        }
        ?>
        </table><br>
        <input type="submit" name="btnsimpan" value="simpan">
    </form><br>
    <form method="post" action="index.php">
        <input type="submit" name="btnkembali" value="kembali">
    </form>
</body>

</html>
