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
for ($i = 0; $i < count($a); $i++){
    for ($j = 0; $j < count($a); $j++) {
        if ($i != $j){
            $pairs[] = [$a[$i], $a[$j]];
        }
    }
}

var_dump($pairs);

?>
</body>
</html>