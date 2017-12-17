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

function arrayOfDivisors($a)
{
    $divisors = array();
    for ($i = 1; $i < $a; $i++) {
        if ($a % $i == 0) {
            $divisors [] = $i;
        }
    }
    return $divisors;
}

function isPerfect($i)
{
    $divisors = arrayOfDivisors($i);
    if (array_sum($divisors) == $i) {
        return true;
    }
}

$i = 1;
while ($i <= 1000) {
    if (isPerfect($i))
        echo "Skaicius " . $i . " yra tobulas. <br>";
    $i++;
}


?>
</body>
</html>