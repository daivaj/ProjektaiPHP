<!DOCTYPE html>
<html>
<head>
    <title>php2uzduotis</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="style.css?v=3">
</head>

<body>

<?php

$zmones = [
    ['vardas' => 'Jonas', 'lytis' => 'V'],
    ['vardas' => 'Ona', 'lytis' => 'M'],
    ['vardas' => 'Petras', 'lytis' => 'V'],
    ['vardas' => 'Marytė', 'lytis' => 'M'],
    ['vardas' => 'Eglė', 'lytis' => 'M']
];

function groups(array $a)
{
    $groups = [];
    foreach ($a as $key => $value) {
        for ($i = 0; $i < count($groups) + 1; $i++) {
            if (empty($groups[$i])) {
                $groups[$i][] = $value;
                break;
            }
            if (count($groups[$i]) < 2) {
                if ($groups[$i][0]['lytis'] != $value['lytis'])
                    $groups[$i][] = $value;
                break;
            }
        }
    }
    return $groups;
}

var_dump(groups($zmones));


?>
</body>
</html>