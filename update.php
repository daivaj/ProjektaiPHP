<?php
require_once 'db.php';
$conn = connectDB();

if (!$_POST) {
    exit();
}

$date = $_POST['date'];
$number = $_POST['number'];
$distance = $_POST['distance'];
$time = $_POST['time'];
$driverid = $_POST['driverid'];
$id = $_POST['id'];

$sql = $conn->prepare('UPDATE radars set date = ?, number = ?, distance = ?, time = ?, driverid = ? WHERE id = ?');
$sql->bind_param('ssddii', $date, $number, $distance, $time, $driverid, $id);
$sql->execute();
