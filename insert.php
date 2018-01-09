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
//$id = $_POST['id'];

$stmt = $conn->prepare("INSERT INTO radars(date, number, distance, time)
VALUES(?, ?, ?, ?)");

$stmt->bind_param("ssdd", $date, $number, $distance, $time);
$stmt->execute();