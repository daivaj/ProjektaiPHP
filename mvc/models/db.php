<?php
function connectDB(){
    $serverName = "localhost";
    $userName = "Auto";
    $password = "labaislaptas123";
    $dbName = "auto";

    $conn = new mysqli($serverName, $userName, $password, $dbName);

    if ($conn->connect_error) {
        die("Nepavyko prisijungti: " . $conn->connect_error);
    } return $conn;
}
