<?php

require_once $dir . '/models/radars.php';

$puslapis = @$_GET['puslapis'];

$ip = 5;

if ($puslapis < 1) {
    $puslapis = 0;
}

$pages = Radar::getTotal();


$radars = Radar::all($ip, $ip * $puslapis);



include $dir . '/views/radars/list.php';