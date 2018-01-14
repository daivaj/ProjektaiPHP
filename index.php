<!DOCTYPE html>
<html>
<head>
    <title>Vairuotojai ir automobiliai</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="style.css?v=3">
</head>
<body>

<?php
require_once 'db.php';
require_once 'functions.php';

$conn = connectDB();

if (isset($_GET['delete'])) {
    $sql = "DELETE FROM radars WHERE id = ". intval($_GET['delete']);
    $conn->query($sql);
}
$row = [];
if (isset($_GET['edit'])) {
    $sql = "SELECT * FROM radars WHERE id = ". intval($_GET['edit']);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}
if (isset($_POST['save'])) {
    if (intval($_POST['id']) > 0) {
        echo "update";
        require_once 'update.php';
    } else {
        require_once 'insert.php';
        echo "insert";
    }
}
?>
<h1>Pradzia</h1>
<a href="vairuotojai.php">Vairuotojai</a>
<a href="automobiliai.php">Automobiliai</a>



<form method='get' action="?">
    <button name="button" value="auto" type="submit">Automobiliai</button>
    <button name="button" value="year" type="submit">Metai</button>
    <button name="button" value="month" type="submit">Menuo</button>
</form>

<?php

$puslapis = @$_GET['puslapis'];

$ip = 5;

if ($puslapis < 1) {
    $puslapis = 0;
}

if (isset($_GET['button']) && $_GET['button'] == 'auto') {
    $sql = "SELECT count(*) as viso FROM radars GROUP BY `number`";
    $rezult = $conn->query($sql);
    $visoIrasu = $rezult->num_rows;
    $sql = 'SELECT number, COUNT(*) AS kiekis, MAX(distance/time) AS maxgreitis FROM radars GROUP BY number ORDER BY maxgreitis DESC LIMIT ' . ($ip * $puslapis) . ', ' . $ip;

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <table>
            <tr>
                <th>Numeris</th>
                <th>Irasu skaicius</th>
                <th>Maksimalus greitis</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['number'] ?></td>
                    <td><?= $row['kiekis'] ?></td>
                    <td><?= round($row['maxgreitis']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <?php
        puslapiavimas($puslapis, $visoIrasu, $ip);
    } else {
        echo 'nėra duomenų';
    }
}

if (isset($_GET['button']) && $_GET['button'] == 'year') {
    $sql = "SELECT count(1) as viso FROM radars GROUP BY YEAR(date)";
    $rezult = $conn->query($sql);
    $visoIrasu = $rezult->num_rows;

    $sql = 'SELECT date, COUNT(*) AS kiekis, 
YEAR(date) AS metai, 
MAX(distance/time) AS maxgreitis, 
Min(distance/time) AS mingreitis, 
AVG(distance/time) AS vidgreitis FROM radars GROUP BY metai ORDER BY maxgreitis DESC LIMIT ' . ($ip * $puslapis) . ', ' . $ip;

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <table>
            <tr>
                <th>Metai</th>
                <th>Irasu skaicius</th>
                <th>Maksimalus greitis</th>
                <th>Minimalus greitis</th>
                <th>Vidutinis greitis</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['metai'] ?></td>
                    <td><?= $row['kiekis'] ?></td>
                    <td><?= round($row['maxgreitis']) ?></td>
                    <td><?= round($row['mingreitis']) ?></td>
                    <td><?= round($row['vidgreitis']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <?php
        puslapiavimas($puslapis, $visoIrasu, $ip);
    } else {
        echo 'nėra duomenų';
    }
}

if (isset($_GET['button']) && $_GET['button'] == 'month') {
    $sql = "SELECT count(1) as viso FROM radars GROUP BY YEAR(date), MONTH(date)";
    $rezult = $conn->query($sql);
    $visoIrasu = $rezult->num_rows;

    $sql = 'SELECT date, COUNT(*) AS kiekis, 
YEAR(date) AS metai, 
MONTH(date) AS menuo, 
MAX(distance/time) AS maxgreitis, 
Min(distance/time) AS mingreitis, 
AVG(distance/time) AS vidgreitis FROM radars GROUP BY metai, menuo ORDER BY metai, menuo LIMIT ' . ($ip * $puslapis) . ', ' . $ip;

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <table>
            <tr>
                <th>Metai</th>
                <th>Menuo</th>
                <th>Irasu skaicius</th>
                <th>Maksimalus greitis</th>
                <th>Minimalus greitis</th>
                <th>Vidutinis greitis</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['metai'] ?></td>
                    <td><?= $row['menuo'] ?></td>
                    <td><?= $row['kiekis'] ?></td>
                    <td><?= round($row['maxgreitis']) ?></td>
                    <td><?= round($row['mingreitis']) ?></td>
                    <td><?= round($row['vidgreitis']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <?php
        puslapiavimas($puslapis, $visoIrasu, $ip);
    } else {
        echo 'nėra duomenų';
    }
}

// išvedame automobilius

if (!isset($_GET['button'])) {
    $sql = "SELECT count(1) as viso FROM radars";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $visoIrasu = $row['viso'];

    $sql = 'SELECT *, `distance`/`time`*3.6 as `speed` FROM radars ORDER BY number, date LIMIT ' . ($ip * $puslapis) . ', ' . $ip;

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Numeris</th>
                <th>Data</th>
                <th>Atstumas (km)</th>
                <th>Laikas (h)</th>
                <th>Greitis (km/h)</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['number'] ?></td>
                    <td><?= $row['date'] ?></td>
                    <td><?= $row['distance'] ?></td>
                    <td><?= $row['time'] ?></td>
                    <td><?= round($row['speed']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <?php
        puslapiavimas($puslapis, $visoIrasu, $ip);
    } else {
        echo 'nėra duomenų';
    }
}

?>

</body>
</html>