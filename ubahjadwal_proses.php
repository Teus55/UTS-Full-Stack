<?php
require_once('class/jadwal.php');
$objJadwal = new Jadwal();
if (isset($_POST['btnsimpan'])) {
    if (isset($_POST["nrp"])) {
        $nrp = $_POST["nrp"];
        if (!isset($_POST["chk"])) {
            header("location:ubahjadwal.php?nrp=" . $nrp . "&error=1");
        } else {
            $objJadwal->deleteData($nrp);
            foreach ($_POST["chk"] as $chk) {
                $jam = (explode(".", $chk)[0]) + 1;
                $hari = (explode(".", $chk)[1]) + 1;
                $res = $objJadwal->insertJadwal($nrp, $jam, $hari);
            }
        }
    }
}

header("location:index.php");
