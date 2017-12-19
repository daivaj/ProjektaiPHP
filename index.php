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

$a = ['Jonas',
    'Petras',
    'Antanas',
    'Povilas'
];

$pairs = [];
foreach($a as $key => $value) {
    foreach(array_slice($a, $key + 1) as $key2 => $value2) {
        $pairs[] = [$value, $value2];
    }
}

var_dump($pairs);

?>

</body>

</html>