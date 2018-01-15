<?php

require_once $dir . '/models/drivers.php';

$id = $_REQUEST['id'];

Radar::remove($id);

include $dir . '/views/drivers/list.php';
