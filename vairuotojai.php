<!DOCTYPE html>
<html>
<head>
    <title>Vairuotojai</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="style.css?v=3">
</head>
<body>
<h1>Vairuotojai</h1>
<a href="index.php">Pradzia</a>
<a href="automobiliai.php">Automobiliai</a>
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
    $sql = "DELETE FROM drivers WHERE driverid = ". intval($_GET['delete']);
    $conn->query($sql);
}

$row = [];
if (isset($_GET['edit'])) {
    $sql = "SELECT * FROM drivers WHERE driverid = ". intval($_GET['edit']);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

if (isset($_POST['save'])) {
    if (intval($_POST['id']) > 0) {
        echo "update";
        if (!$_POST) {
            exit();
        }

        $name = $_POST['name'];
        $city = $_POST['city'];
        $id = $_POST['id'];

        $sql = $conn->prepare('UPDATE drivers set name = ?, city = ? WHERE driverid = ?');
        $sql->bind_param('ssi', $name, $city, $id);
        $sql->execute();
    } else {
        if (!$_POST) {
            exit();
        }

        $name = $_POST['name'];
        $city = $_POST['city'];
        $stmt = $conn->prepare("INSERT INTO drivers(name, city)
VALUES(?, ?)");

        $stmt->bind_param("ss", $name, $city);
        $stmt->execute();
        echo "insert";
    }
}
?>
<form method='post' action="?">
    <input type='hidden' name='id' required value="<?php if (isset($row['driverid'])) echo $row['driverid'] ?>">
    Vairuotojo vardas: <input type='text' name='name' required value="<?php if (isset($row['name'])) echo $row['name'] ?>"><br>
    Vairuotojo miestas: <input type='text' name='city' required value="<?php if (isset($row['city'])) echo $row['city'] ?>"><br>
    <button name="save" type="submit">Išsaugoti</button>
</form>
<?php

// išvedame vairuotojus

$sql = "SELECT count(1) as viso FROM drivers";
$rezult = $conn->query($sql);
$row = $rezult->fetch_assoc();
$visoIrasu = $row['viso'];

$sql = 'SELECT * FROM drivers LIMIT ' . ($ip * $puslapis) . ', ' . $ip;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Vairuotojo vardas</th>
            <th>Vairuotojo miestas</th>
            <th>Veiksmai</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['driverid'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['city'] ?></td>
                <td>
                    <a href="?edit=<?= $row['driverid'] ?>">Taisyti</a>
                    <a href="?delete=<?= $row['driverid'] ?>">Trinti</a>
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