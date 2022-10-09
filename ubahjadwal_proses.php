<?php
require_once('class/jadwal.php');
$objJadwal = new Jadwal();
if(isset($_POST['btnsimpan'])){
    if(isset($_POST["nrp"])){
    

        $nrp = $_POST["nrp"];

        $objJadwal ->deleteData($nrp);
            for($jam = 0 ;$jam<=11; $jam++){
                for($hari=0;$hari<=6;$hari++){
                    $chk = $_POST["chk.".$jam.".".$hari];
                    echo $chk;
                    // if($chk == ){
                    //     $jamKuliah = (explode(".",$_POST["chk.".$jam.".".$hari])[0]);
                    //     $hariKuliah = (explode(".",$_POST["chk.".$jam.".".$hari])[1]);
                    //     echo $jamKuliah;
                    //     echo "-";
                    //     echo $hariKuliah." ";
                    //     $ress = $objJadwal ->insertJadwal($nrp, $jamKuliah, $hariKuliah);
                    // }
                }

     }
    }
    
}

//header("location:index.php");
