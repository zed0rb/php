<?php



$arr =[[3, 4, 6, 4],
    [5, 6, 2, 1],
    [1, 4, 7, 4],
];

    $dataLength = count($arr);
    $rowLength = count($arr[0]);
    $colSum = 0;
    $col1Sum = 0;
    $col2Sum = 0;
    $col3Sum = 0;

for ($i = 0; $i< $rowLength; $i++){
    $colSum += $arr[$i][0];
    $col1Sum += $arr[$i][1];
    $col2Sum += $arr[$i][2];
    $col3Sum+= $arr[$i][3];


}
 echo "Stulpeliu suma: $colSum $col1Sum $col2Sum $col3Sum<br>";

echo "-------------------------------------<br>";

if ($colSum> $col1Sum && $colSum> $col2Sum && $colSum> $col3Sum){
    echo "$colSum";
} elseif (( $colSum> $col2Sum && $col1Sum> $col3Sum)){
    echo "$col1Sum";
}elseif ( $col2Sum> $col3Sum){
    echo "$col2Sum";
}else {
    echo "$col3Sum";
}

$a = [[5,3,4],
    [3,4,4],
    [2,2,3]];

echo "<br>--------------------------------------<br>";
function istrizainiuSuma($array){
    $istSum1=0;
    $istSum2=0;
    $dataLength = count($array);
    $s = $dataLength;
    for ($i = 0; $i < $dataLength; $i++){
        $s--;
        $istSum1 += $array[$i][$i];
        $istSum2 += $array[$s][$i];

    }
    echo "$istSum1 $istSum2";
}

istrizainiuSuma($a);
