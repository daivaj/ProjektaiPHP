<?php
require_once ('db.php');
$conn = connectDB();

if (!$_POST) {
    exit();
}

$date = $_POST['date'];
$number = $_POST['number'];
$distance = $_POST['distance'];
$time = $_POST['time'];
$driverid = $_POST['driverid'];

$stmt = $conn->prepare("INSERT INTO radars(date, number, distance, time, driverid)
VALUES(?, ?, ?, ?, ?)");

$stmt->bind_param("ssddi", $date, $number, $distance, $time, $driverid);
$stmt->execute();