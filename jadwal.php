<?php
require_once("parent.php");

class Jadwal extends orangtua
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getJadwal($nrp)
    {
        $sql = "SELECT j.idhari, j.idjam_kuliah, jk.jam_mulai, jk.jam_selesai FROM jadwal j INNER JOIN jam_kuliah jk on j.idjam_kuliah = jk.idjam_kuliah WHERE j.nrp = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $nrp);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function deleteData($nrp)
    {
        $sql = "DELETE FROM jadwal where nrp=?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $nrp);
        $stmt->execute();
    }

    public function insertJadwal($nrp, $jadwal, $hari){
        $sql = "INSERT INTO jadwal(nrp, idhari, idjam_kuliah) VALUES (?, ?, ?) ";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("iii", $nrp,$hari,$jadwal);
        $stmt->execute();
        return $stmt->insert_id;
    }
}
