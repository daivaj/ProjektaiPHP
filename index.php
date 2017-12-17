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

$a = array(5, 6, 10, 15);
$b = array(8, 5, 3, 25);

function arrayAverage($a)
{
    $suma = 0;
    for ($i = 0; $i < count($a); $i++) {
        $suma += $a[$i];

    }
    return $suma / count($a);
}

$averageA = arrayAverage($a);
$averageB = arrayAverage($b);

echo "A masyvo skaiciu vidurkis yra " .$averageA. "<br>";

echo "B masyvo skaiciu vidurkis yra " .$averageB. "<br>";

$x = $averageA - $averageB;

echo "Masyvu vidurkiu skirtumas yra " .$x. "<br>";

?>

</body>

</html>