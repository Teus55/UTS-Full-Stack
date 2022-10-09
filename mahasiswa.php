<?php
require_once("parent.php");

class mahasiswa extends orangtua
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getMahasiswa($nrp = null)
    {
        if ($nrp == null) {
            $stmt = $this->mysqli->query("SELECT * FROM mahasiswa");
            return $stmt;
        } else {
            $sql = "SELECT * FROM mahasiswa WHERE nrp = ?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("i", $nrp);
            $stmt->execute();
            $res = $stmt->get_result();
            return $res;
        }
    }
}
