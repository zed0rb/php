<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

// kaip apsisaugot jei mokinys neturi pazimiu is vieno dalyko????


    $mokiniai = [
        ['vardas' => 'Jonas',
        'pazymiai' =>[
            'lietuviu' => [4, 8, 6, 7],
            'anglu' =>[6, 7, 8],
            'matematika' => [3, 5, 4]]],
        ['vardas' => 'Ona',
        'pazymiai' => [
            'lietuviu' => [10, 9, 10],
            'anglu' => [9, 8, 10],
            'matematika' => [10, 10, 9, 9]]],
        ['vardas' => 'Mama',
        'pazymiai' => [
            'lietuviu' => [7, 7, 7, 6, 9],
            'anglu' => [3, 2, 2],
            'matematika' => [10, 4, 9, 5]]],


];
    $pazymiuArr = [];
    $col = 7; 
    $o = 0; // skirtas sukti pazimiu loop'ui
    
    // naujas pazymiu array
    foreach ($mokiniai as $b){
        foreach ($b['pazymiai'] as $c => $d){

                array_push($pazymiuArr, $d);

        }
    }
    





 ?>

    <table border="1">

            <tr>
                <th>Vardas</th>
                <th>Lietuviu pažymiai</th>
                <th>L vidurkis</th>
                <th>Anglu p</th>
                <th>A vidurkis</th>
                <th>Matematikos p</th>
                <th>M vidurkis</th>
                <th>Bendras</th>
            </tr>

        <?php foreach ($mokiniai as $indeksas => $value):

            $bendrasVidurkis = [];

            ?>

            <tr>

                <th><?= $value['vardas'] ?></th>

                <?php for ($i = 0; $i < $col; $i++):

                   // atspauzdina bendra vidurki
                   if ($i == $col - 1){

                       $bv = array_sum($bendrasVidurkis) / count($bendrasVidurkis);
                       echo "<td>" . round($bv, 1) . "</td>";


                   // atspauzdina dalyku vidurkius ir pazymius
                   } else {
                        if ($i%2 == 0) {

                            echo "<td>" . implode(', ', $pazymiuArr[$o]) . "</td>";

                        } else {
                            $marksAve = 0;
                            $marksAve = array_sum($pazymiuArr[$o]) / count($pazymiuArr[$o]);
                            echo "<td>" . round($marksAve, 1) . "</td>";
                            $o++;
                            array_push($bendrasVidurkis, $marksAve);
                        }




                   }?>


                <?php endfor; ?>
            </tr>

        <?php endforeach; ?>

<?php



?>

</body>
</html>

