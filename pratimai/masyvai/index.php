<?php



$arr =[
    [3, 4, 6, 4],
    [5, 6, 2, 1],
    [1, 4, 7, 4],
];

    $dataLength = count($arr);
    $rowLength = count($arr[0]);



for ($i = 0; $i< $rowLength; $i++){
    for ($j = 0; $j < $dataLength; $j++){
        $colSum[$i] += $arr[$j][$i];
    }
}

echo "Stulpeliu suma:<br>";
for ($i = 0; $i < $rowLength; $i++){
    echo "$colSum[$i] ";
}

echo "<br>-------------------------------------<br>";




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


