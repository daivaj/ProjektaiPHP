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
$id = $_POST['id'];

$sql = $conn->prepare('UPDATE radars set date = ?, number = ?, distance = ?, time = ? WHERE id = ?');
$sql->bind_param('ssddi', $date, $number, $distance, $time, $id);
$sql->execute();
