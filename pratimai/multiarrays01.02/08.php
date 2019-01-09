<?php

$zmones = [
    array('vardas' => 'Jonas', 'lytis' => 'V'),
    array('vardas' => 'Ona', 'lytis' => 'M'),  
    array('vardas' => 'Petras', 'lytis' => 'V'), 
    array('vardas' => 'Marytė', 'lytis' => 'M'),
    array('vardas' => 'Eglė', 'lytis' => 'M')
];

foreach ($zmones as $indeksas1 => $zmogus1){
    foreach ($zmones as $indeksas2 => $zmogus2){

        if ($indeksas1 < $indeksas2 && $zmogus1['lytis'] != $zmogus2['lytis']) {
            echo "<br>" .
                $indeksas1 . " " .
                $zmogus1['vardas'] . " - " .
                $indeksas2 . " " .
                $zmogus2['vardas'];
        }
    }
}

echo "<br>---------------------<br>";

foreach ($zmones as $indeksas1 => $zmogus1){
    foreach ($zmones as $indeksas2 => $zmogus2){
        foreach ($zmones as $indeksas3 => $zmogus3)
        if ($indeksas1 < $indeksas2 && $indeksas2 < $indeksas3 && ($zmogus1['lytis'] != $zmogus2['lytis'] || $zmogus1['lytis'] != $zmogus3['lytis'])) {
            echo "<br>" .
                $zmogus1['vardas'] . " - " .
                $zmogus2['vardas'] . " - " .
                $zmogus3['vardas'];
        }
    }
}
