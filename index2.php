<!DOCTYPE html>
<html>
<head>
    <title>phppradzia</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="style.css?v=3">
</head>

<body>

<!---->
<!--                <img src="logo.jpg" class="logo1">-->
<!---->
<!--                <img src="logo.jpg" class="logo">-->
<!---->
<!--<table class="table">-->
<!--    <tr>-->
<!--        <th class="th">Vardas</th>-->
<!--        <th>Pavardė</th>-->
<!--        <th>Gimimo data</th>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td class="td"> Vardenis</td>-->
<!--        <td> Pavardenis</td>-->
<!--        <td>1987-12-26</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td>1vardas</td>-->
<!--        <td>1pavarde</td>-->
<!--        <td>1956-10-20</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td>2vardas</td>-->
<!--        <td>2pavarde</td>-->
<!--        <td>1956-10-20</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td>3vardas</td>-->
<!--        <td>3pavarde</td>-->
<!--        <td>1956-10-20</td>-->
<!--    </tr>-->
<!--</table>-->

<?php
////Veikia
//echo "Hello World!<br>";
////Veikia
//ECHO "Hello World!<br>";
////Veikia
//EcHo "Hello World!<br>";
//
//$spalva = "raudona";
//echo "Spalva yra " .$spalva ."<br>";
//// Neveikia
////echo "Spalva yra " .$SPALVA ."<br>";
////echo "Spalva yra " .$spALVA ."<br>";
//
//?>

<?php
//$x = true;
//$y = false;
//
//var_dump($x, $y)"<br>";
//
//$x = 2.5;
//$y = (int) $x;
//
//var_dump($x, $y)"<br>";
//
//$x = 53.49;
//$y = 50;
//
//$z = $x + $y;
//
//var_dump((int) $z)"<br>";
//
//
//
//echo 'this is a simple string <br>';
//
//
//
//echo 'Jūs taip pat galite rašyti
//eilutes ir per kelias' "<br>";
//
//
////Išveda: Arnold once said: "I'll be back"
//echo 'Arnold once said "I\'ll be back'"<br>";
//
//$array = [1,
//    100.5,
//    "Lietuva",
//    ["BMW", "AUDI"]];
//
//var_dump($array);
//
//$array = [2,
//    4,
//    8,
//    16];
//
//$array[2] += 2;
//
//var_dump($array);

//$a = [
//    260,
//    35.625,
//    5,
//    7,
//    55998,
//]
//
//$x = $a[0];
//
//for ($i = 1, $i < count($i), $i++) {
//    if ($a[$i] > $x) {
//        $x = $a[$i];
//    }
//}
//
//var_dump($x);
//
//$a = [
//    [2, 5, 9],
//    [56, 87, 42],
//    [255, 45, 36],
//]
//
//for ($i = 0, $i < count($a), $i++) {
//    $max = $a[$i][0];
//    for ($j = 1, $j < count($a[$i]), $j++) {
//        if ($a[$i][$j] > $max) {
//            $max = $a[$i][$j];
//        }
//    }
//    echo "$max <br>";
//}

//class klase
//{
//    function labasPasauli()
//    {
//        echo "Labas, pasauli!";
//    }
//}
//
//$obj = new klase;
//$obj->labasPasauli();
//
//class vardas
//{
//    function vardas($vardas)
//    {
//        $vardas = 'Daiva';
//    }
//}
//
////function pasisveikinti($vardas){
////                echo "<br> Labas, ".$vardas;
////            }
////
////            pasisveikinti("Vardenis");
//
//$obj = new vardas;
//$obj->$vardas();

$a = 2;
$b = $a * 3;

$pareigos = "Marshal";
$pavarde = 'D\'Artagnan';

$pasisveikinti =
    "Hello " .$pareigos. " " .$pavarde;

echo $pasisveikinti;

echo '<br>';


//$a = -2 + 4;
//$b = $a * 3;
//$c = $a / 4;
//$d = $a % 4;
//$a *= 2;

$a = 8;
//$a++;
//++$a;
$x = $a-- + 2;
$y = ++$a * 2;


echo $x;
echo '<br>';

echo $y;
echo '<br>';

$a = 'D\'Artagnan';
$x = count($a);
$y = htmlentities("<b>{$a}</b>");
$z = html_entity_decode($y);

echo $a;
echo '<br>';
echo $x;
echo '<br>';
echo $y;
echo '<br>';
echo $z;

$favcolor = "red";

switch ($favcolor) {
    case "red":
        echo "Your favorite color is red!";
        break;
    case "blue":
        echo "Your favorite color is blue!";
        break;
    case "green":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}

echo '<br>';

$a = array(
    [5, 6, 8, 9],
    [12, 3, 4, 11],
    [7, 5, 15, 10],

);

var_dump($a);



?>
</body>
</html>