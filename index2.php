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
session_start();

require_once('auto.php');

require_once ('functions.php');

if (!empty($_POST)){

    $_SESSION['duomenys'][]=$_POST;
    echo '<script>window.location=window.location;</script>'; exit();
}

if (!empty($_SESSION['duomenys'])){
    $auto=[];
    foreach ($_SESSION['duomenys'] as $value){
        $auto[] = new Radar($value['dataLaikas'], $value['numeris'], $value['atstumas'], $value['laikas']);
    }

    usort($auto, function ($p1, $p2){
        return ($p1->getSpeed() < $p2->getSpeed());
    });
}


?>

<h1>Registracija</h1>
<div>
    <form method="post">
        <input name="dataLaikas" placeholder="Data ir laikas" type="date, number">
        <input name="numeris" placeholder="Automobilio numeris" type="text">
        <input name="atstumas" placeholder="Nuvaziuotas atstumas (m)" type="number">
        <input name="laikas" placeholder="Sugaistas laikas (s)"type="number">
        <input type="submit" value="Registruoti">
    </form>

</div>
<table>
    <tr>
        <th>Registracijos data ir laikas</th>
        <th>Automobilio numeris</th>
        <th>Nuvaziuotas atstumas m</th>
        <th>Sugaištas laikas s</th>
        <th>Greitis m/s</th>
        <th>Greitis km/h</th>
    </tr>
    <tr>
        <?php lentele($auto); ?>
    </tr>

</table>

</body>
</html>