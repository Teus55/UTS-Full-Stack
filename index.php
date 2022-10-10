<?php
require_once('class/mahasiswa.php');
require_once('class/jadwal.php');
require_once('class/jamkuliah.php');
$objMahasiswa = new mahasiswa();
$objJamkuliah = new jamkuliah();
$objJadwal = new Jadwal();
if (isset($_POST['btnsubmit'])) {
    $nrp = $_POST['selMahasiswa'];
} else {
    $nrp = null;
}
if (isset($_GET['error'])) {
    $message = "Tolong Pilih Mahasiswa!";
    echo "<script type='text/javascript'>alert('$message');</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <title>Document</title>
</head>

<body>
    <form method="post">
        <p><label for="">Mahasiswa : </label>
            <select id="selMahasiswa" name="selMahasiswa">
                <option>--Pilih Mahasiswa--</option>
                <?php
                $res = $objMahasiswa->getMahasiswa();
                while ($row = $res->fetch_assoc()) {
                    if ($row['nrp'] != $nrp) {
                        echo "<option value='" . $row['nrp'] . "'>" . $row['nama'] . "</option>";
                    } else {
                        echo "<option value='" . $row['nrp'] . "'selected>" . $row['nama'] . "</option>";
                    }
                }
                ?>
            </select>
            <input type="submit" name="btnsubmit" value="Cek Jadwal" id="btnsubmit">
        </p>
    </form>
    <p><button id='btnmahasiswa'>Pilih Mahasiswa</button></p>
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
                    echo "<td style='text-align:center'>&#9989</td>";
                } else {
                    echo "<td></td>";
                }
            }
            echo "</tr>";
            $i++;
        }
        ?>
    </table><br>
    <?php
    echo "<a id='link'><button id='btnubah' disabled>Ubah Jadwal</button></a>";
    ?>
    <script type="text/javascript">
        $("#btnmahasiswa").click(function() {
            var nrp = $('#selMahasiswa').val();
            $("#link").attr("href","ubahjadwal.php?nrp="+ nrp);
            $("#btnubah").removeAttr("disabled");
        });
    </script>
</body>

</html>
