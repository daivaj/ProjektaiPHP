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

$zmones = [
    ['vardas' => 'Jonas', 'lytis' => 'V'],
    ['vardas' => 'Ona', 'lytis' => 'M'],
    ['vardas' => 'Petras', 'lytis' => 'V'],
    ['vardas' => 'Marytė', 'lytis' => 'M'],
    ['vardas' => 'Eglė', 'lytis' => 'M']
];

function pairs(array $a)
{
    $pairs = [];
    foreach ($a as $key => $value) {
        foreach (array_slice($a, $key + 1) as $key2 => $value2) {
            if ($value['lytis'] != $value2['lytis']) {
                $pairs[] = [$value, $value2];
            }

        }
    }
    return $pairs;
}

var_dump(pairs($zmones));

?>

</body>

</html>