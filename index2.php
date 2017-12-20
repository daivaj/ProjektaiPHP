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

$mokiniai = require ('array.php');

require ('functions.php');

$vidurkiai = [];

$bestIndex = 0;

foreach ($mokiniai as $key => $mokinys){
    $vidurkiai[$key] = averageStudent($mokinys);
    if ($vidurkiai[$bestIndex] < $vidurkiai[$key]){
        $bestIndex = $key;
    }
}

var_dump($vidurkiai);

echo 'Geriausiai mokosi ' .$mokiniai[$bestIndex]['vardas']. '. Jo/jos vidurkis ' .$vidurkiai[$bestIndex];
?>
</body>
</html>