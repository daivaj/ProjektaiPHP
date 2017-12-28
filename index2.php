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

require_once('auto.php');

require_once ('functions.php');

usort($auto, function ($p1, $p2){
    return ($p1->getSpeed() < $p2->getSpeed());
});

var_dump($auto);

?>
</body>
</html>