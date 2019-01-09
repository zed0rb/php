<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>trikampiai</title>
</head>
<body>


<!-- Sunkiausiai buvo sugalvot kaip atspauzdinti plota tinkamai.
Jei turi skaitmenu po kablelio rodytu tik 2 skaicius ( 6,34),
o jei neturi nerodytu nuliu. -->


    <?php
        $triArray = [
            [3, 4, 5],
            [2, 10, 8],
            [5, 6, 5],
            [5, 5, 5],
            [6, 6, 6]
    ];

        $arrayLength = count($triArray);


        for ($i = 0; $i < $arrayLength; $i++){

            // prisiskiriu reiksmias, kad butu paprasciau suprast koda

            $a = $triArray[$i][0];
            $b = $triArray[$i][1];
            $c = $triArray[$i][2];

            // tikrinu ar tai isvis trikampis

            echo "Trikampis : $a $b $c <br>";

            // tikrinu ar tai trikampis

            if ($a < $b + $c && $b < $a + $c && $c < $a + $b ){

                // tikrinu koks trikampis

                if ($a == $b && $b == $c){
                    echo "Lygiakraštis trikampis<br>";

                } elseif ($a != $b && $a != $c && $b != $c){

                    echo "Įvairiakraštis trikampis<br>";

                } else

                    echo "Lygiašonis trikampis<br>";


                // apskaiciuojam trikampio plota
                // naudoju Herono formule
                // p = pusperetmis, s=plotas,

                $p = ($a + $b + $c) / 2;
                $s = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));

                // patikrinu ar skaicius decimal formato ir rasau 2 sk po kablelio.
                // galima naudot round($s, 2)

               // if ($s < number_format((float)$s, 2, '.', '' ))

                   // echo "Trikampio plotas: " . number_format((float)$s, 2, '.', '' ) . "<br>";

               //  else


                echo "Trikampio plotas: " . round($s, 2) . "<br>";
            }else {
                echo "Netrikampis<br>";
            }

            echo "------------------------<br>";
        }




    ?>
</body>
</html>


