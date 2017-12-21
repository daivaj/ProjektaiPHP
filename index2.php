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

require_once ('mokiniai.php');

require_once ('functions.php');


$sarasas = mazejimas($mokiniai);



?>
<table>
    <tr>
        <th>vardas</th>
        <th>pavarde</th>
        <th>bendras vidurkis</th>
    </tr>
        <?php lentele($sarasas); ?>


</table>
</body>
</html>