<table>
    <tr>
        <th>Nr</th>
        <th>Vardas</th>
        <th>Adresas</th>
        <th></th>
    </tr>

<?php
// output data of each row
$nr = 1;

foreach($drivers as $a): ?>
    <tr>
        <td><?= $nr++ ?></td>
        <td><?= $a->name ?></td>
        <td><?= $a->city ?></td>
        <td>
            <a href="<?= $base ?>drivers/edit?id=<?= $a->driverid ?>">Redaguoti</a>
            <a href="<?= $base ?>drivers/delete?id=<?= $a->driverid ?>">Trinti</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>

<?php
puslapiavimas($puslapis, $pages, $ip);
?>

