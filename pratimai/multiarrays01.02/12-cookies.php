<?php

$automobiliai = [];
if(isset($_COOKIE['auto'])) {
    $automobiliai = json_decode($_COOKIE['auto'], true);
}

if (isset($_POST["Valyti"])) {
    $automobiliai = [];
    setcookie(auto, "", time()-1000);

} else if (isset($_POST["date"])) {
    $speed = round($_POST["distance"]/$_POST["time"]*3.6,2);
    $automobiliai[] = [
        "date" => $_POST["date"],
        "car_num" => $_POST["car_num"],
        "distance" => $_POST["distance"],
        "time" => $_POST["time"],
        "speed" => $speed
    ];

    usort($automobiliai,function ($s1, $s2) {
        if ($s1['speed']==$s2['speed']) {
            return 0;
        } else if ($s1['speed']<$s2['speed']) {
            return 1;
        } else {
            return -1;
        }
    });

    setcookie(auto, json_encode($automobiliai));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COOKIES</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<form id="form" method="POST">
    <table>
        <tr>
            <th><label>Greičio fiksavimo data ir laikas</label></th>
            <td><input type="text" name="date" required></td>
        </tr>
        <tr>
            <th><label>Automobilio numeris</label></th>
            <td><input type="text" name="car_num" required></td>
        </tr>
        <tr>
            <th><label>Nuvažiuotas atstumas (metrai)</label></th>
            <td><input type="number" name="distance" required></td>
        </tr>
        <tr>
            <th><label>Sugaištas laikas (sekundės)</label></th>
            <td><input type="number" name="time" required></td>
        </tr>
        <tr><td colspan="2"><input type="submit" value="Įvesti"></td></tr>
    </table>
</form>
<div id="results">
    <?php
    echo "<table>";
    echo "<tr><th>Greičio fiksavimo data ir laikas</th>";
    echo "<th>Automobilio numeris</th>";
    echo "<th>Nuvažiuotas atstumas (metrai)</th>";
    echo "<th>Sugaištas laikas (sekundės)</th>";
    echo "<th>Greitis (km/h)</th></tr>";
    if(!empty($automobiliai)){
        foreach($automobiliai as $a) {
            echo "<tr><td>" . $a['date'] . "</td>";
            echo "<td>" . $a['car_num'] . "</td>";
            echo "<td>" . $a['distance'] . "</td>";
            echo "<td>" . $a['time'] . "</td>";
            echo "<td>" . $a['speed'] . "</td></tr>";
        }
    }
    echo "</table>";
    ?>
</div>

<form method="POST">
    <input type="hidden" value="1" name="Valyti">
    <button>Išvalyti</button>
</form>

</body>
</html>