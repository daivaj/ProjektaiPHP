<?php

require_once $dir . '/models/radars.php';
require_once $dir . '/models/drivers.php';

if (!empty($_POST)){
    $radar = new Radar();
    if (!empty($_POST['id']))$radar->id =$_POST['id'];
    $radar->date = $_POST['date'];
    $radar->number = $_POST['number'];
    $radar->distance = $_POST['distance'];
    $radar->time = $_POST['time'];
    $radar->speed = round($radar->distance / $radar->time * 3.6);
    $radar->driverid = $_POST['driverid'];
    $radar->save();
}

$id = $_REQUEST['id'];
$a = Radar::get($id);
$b = Driver::all(9999999, 0);

require_once $dir . '/views/radars/edit.php';



