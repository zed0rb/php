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

$a = [
    [1, 4, 6],
    [3, 2 => 6, 5],
    [4 => 6, 8]
];

$columns = columns($a);

$totals = [];
foreach ($a as $row) {
    foreach ($row as $col => $value) {

        if (!isset($totals[$col])) $totals[$col] = 0;
        $totals[$col] += $value;
    }
}

?>

<table border="1">
    <tr>
        <?php for($i = 0; $i < $columns; $i++): ?>
            <th><?= $i + 1; ?></th>
        <?php endfor; ?>
    </tr>

    <?php for ($row = 0; $row < count($a); $row++): ?>

        <tr>

            <?php for ($col = 0; $col < $columns; $col++): ?>

                <td><?= $a[$row][$col] ?></td>

            <?php endfor; ?>

        </tr>

    <?php endfor; ?>

    <tr>

        <?php for ($col = 0; $col < $columns; $col++): ?>

            <th><?= $totals[$col] ?></th>

        <?php endfor; ?>

    </tr>

</table>

<?php

function columns($a) {
    $max = -1;
    foreach ($a as $value) {
        $maxkey = max(array_keys($value));
        if ($maxkey > $max) $max = $maxkey;
    }
    return $max + 1;
}

?>
</body>
</html>