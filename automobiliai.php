<!DOCTYPE html>
<html>
<head>
    <title>Automobiliai</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="style.css?v=3">
</head>
<body>
<h1>Automobiliai</h1>
<a href="index.php">Pradzia</a>
<a href="vairuotojai.php">Vairuotojai</a>

<?php
require_once 'db.php';
require_once 'functions.php';

$conn = connectDB();

$puslapis = @$_GET['puslapis'];

$ip = 3;

if ($puslapis < 1) {
    $puslapis = 0;
}

if (isset($_GET['delete'])) {
    $sql = "DELETE FROM radars WHERE id = " . intval($_GET['delete']);
    $conn->query($sql);
}

$row = [];
if (isset($_GET['edit'])) {
    $sql = "SELECT * FROM radars WHERE id = " . intval($_GET['edit']);
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

<form method='post' action="?">
    <input type='hidden' name='id' required value="<?php if (isset($row['id'])) echo $row['id'] ?>">
    Data: <input type='text' name='date' required value="<?php if (isset($row['date'])) echo $row['date'] ?>"><br>
    Numeris: <input type='text' name='number' required
                    value="<?php if (isset($row['number'])) echo $row['number'] ?>"><br>
    Atstumas: <input type='number' name='distance' required
                     value="<?php if (isset($row['distance'])) echo $row['distance'] ?>"><br>
    Laikas: <input type='number' name='time' required value="<?php if (isset($row['time'])) echo $row['time'] ?>"><br>
    Vairuotojas: <select name="driverid">
        <option>-------------</option>
        <?php $sql = "SELECT * FROM drivers ORDER BY name";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                $pasirinktas = '';
                if ($rows['driverid'] == $row['driverid']) {
                    $pasirinktas = 'selected = selected';
                } echo '<option value="' . $rows['driverid'] . '" '.$pasirinktas.'>' . $rows['name'] . '</option>';
            }
        } ?>

    </select> <br>
    <button name="save" type="submit">Išsaugoti</button>
</form>

<hr>

<?php

// išvedame automobilius

$sql = "SELECT count(1) as viso FROM radars";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$visoIrasu = $row['viso'];

$sql = 'SELECT *, `distance`/`time`*3.6 as `speed` FROM radars LEFT JOIN drivers ON radars.driverid = drivers.driverid ORDER BY number, date LIMIT ' . ($ip * $puslapis) . ', ' . $ip;
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
            <th>Vairuotojo vardas</th>
            <th>Veiksmai</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['number'] ?></td>
                <td><?= $row['date'] ?></td>
                <td><?= $row['distance'] ?></td>
                <td><?= $row['time'] ?></td>
                <td><?= round($row['speed']) ?></td>
                <td><?= ($row['name']) ?></td>
                <td>
                    <a href="?edit=<?= $row['id'] ?>">Taisyti</a>
                    <a href="?delete=<?= $row['id'] ?>">Trinti</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php
    puslapiavimas($puslapis, $visoIrasu, $ip);
} else {
    echo 'nėra duomenų';
}
?>
</body>
</html>