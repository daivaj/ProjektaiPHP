<!DOCTYPE html>
<html>
<head>
    <title>php2uzduotis</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="style.css?v=3">
</head>

<body>

<?php

$myArray = [
    [1, 3, 4],
    [2, 5],
    [2 => 3, 5 => 8],
    [1, 1, 5 => 1]
];

function sum(array $a)
{
    $sumArray = array();

    foreach ($a as $k => $subArray) {
        foreach ($subArray as $id => $value) {
            @$sumArray[$id] += $value;
        }
    }
    return $sumArray;
}

$x = sum($myArray);

var_dump($x);

function maximum($a)
{
    $max = -999999;
    foreach ($a as $key => $value) {

        if ($value > $max) {
            $max = $value;
        }
    }
    return $max;
}

echo "Didziausia suma yra " .maximum($x);


?>
</body>
</html>