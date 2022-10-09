<?php
require_once("parent.php");

class jam extends orangtua
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getJam()
    {
        $stmt = $this->mysqli->query("SELECT * FROM jam_kuliah");
        return $stmt;
    }
}
