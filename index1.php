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

$array = array(-10, 0, 2, 9, -5);

for ($j = 0; 0 < count($array); $j++){
    $max = $array[0];

    $index = 0;

    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] > $max){
            $max = $array[$i];
            $index = $i;
        }
    }
    echo $max. " ";
    array_splice($array, $index, 1);

}


?>
</body>
</html>