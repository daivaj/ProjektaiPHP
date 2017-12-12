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

$a = [
    4,
    9,
    5,
    52,
    78,
    25,
];
$suma = 0;

for ($i = 0; $i < count($a); $i++) {
    $suma += $a[$i];
}

$vidurkis = $suma / count($a);

echo 'Masyvo elementu vidurkis ' . $vidurkis;

echo '<br>';

$a = [
    4,
    9,
    5,
    52,
    78,
    25,
];
$suma = 0;

for ($i = 1; $i < count($a); $i++) {
    if ($i % 2 == 0) {
        $suma += $a[$i];
    }
}

echo 'Masyvo lyginiu indeksu elementu suma yra ' . $suma;

echo '<br>';

$a = [
    4,
    9,
    5,
    52,
    78,
    25,
];

sort($a);

for ($i = 0; $i < count($a); $i++) {
    echo $a[$i];
    echo '<br>';

}

echo '<br>';

$a = [
    [5, 6, 8, 9],
    [12, 3, 4, 11],
    [7, 5, 15, 10],
];

for ($i = 0; $i < count($a[0]); $i++) {
    $suma = 0;
    for ($j = 0; $j < count($a); $j++) {

        $suma = $suma + $a[$j][$i];

    }
    echo "Stulpelio nr " . ($i + 1) . " suma lygi: " . $suma;
    echo '<br>';
}
echo '<br>';

$a = [
    [5, 6, 8, 9],
    [12, 3, 4, 11],
    [7, 5, 15, 10],
];

for ($i = 0; $i < count($a[0]); $i++) {
    $suma = 0;
    $max = 0;
    for ($j = 0; $j < count($a); $j++) {

        $suma = $suma + $a[$j][$i];
        if ($suma > $max) {
            $max = $suma;
        }
    }
}
echo "Didziausia stulpeliu suma lygi: " . $max;

echo '<br>';
echo '<br>';

$a = [
    [5, 6, 8, 8],
    [1, 3, 4, 2],
    [7, 5, 4, 10],
    [5, 7, 3, 1],
];

$suma1 = 0;
$suma2 = 0;

for ($i = 0; $i < count($a); $i++) {
    $suma1 = $suma1 + $a[$i][$i];
}

$j = count($a) - 1;
for ($i = 0; $i < count($a); $i++) {

        $suma2 = $suma2 + $a[$i][$j];
}
echo "1 istrizaines suma lygi: " . $suma1;
echo '<br>';
echo "2 istrizaines suma lygi: " . $suma2;



?>
</body>
</html>