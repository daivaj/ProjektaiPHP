<?php

require_once $dir . '/models/drivers.php';

if (!empty($_POST)){
    $driver = new Driver();
    if (!empty($_POST['id']))$driver->driverid =$_POST['id'];
    $driver->name = $_POST['name'];
    $driver->city = $_POST['city'];
    $driver->save();
}

$id = $_REQUEST['id'];
$a = Driver::get($id);

require_once $dir . '/views/drivers/edit.php';





