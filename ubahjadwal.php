<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <p><label for="">Mahasiswa : 160344232 - Sahara Devaca<?php ?></label>
            
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
            for ($i = 1; $i < 9; $i++) {
                echo "<tr><td>jam</td>";
                for ($x = 1; $x < 8; $x++){
                    echo "<td><input type='checkbox' name='chk.$i.$x' value='$i.$x' disabled></td>";
                }
                echo "</tr>";
            }
            // while($baris = $res2->fetch_assoc()) {
            //     $start = $baris['jam_start'];
            //     $end = $baris['jam_end'];
            //     echo "<tr><td>.$start-$end.<td>";
            //     echo "<td></td>";
            //     echo "<td></td>";
            //     echo "<td></td>";
            //     echo "<td></td>";
            //     echo "<td></td>";
            //     echo "<td></td>";
            //     echo "<td></td>";
            //     echo "<td></td></tr>";
            // }
            ?>
        </table>
    </form><br>
    <form method="post" action="index.php">
        <input type="submit" name="btnsimpan" value="simpan">
    </form>
</body>

</html>