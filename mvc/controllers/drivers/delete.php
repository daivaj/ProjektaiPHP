<?php

require_once $dir . '/models/drivers.php';

$id = $_REQUEST['id'];
echo "AHA - nori kazkas istrinti  irasa: $id";

$a = Radar::get($id);

include $dir . '/views/drivers/ask_delete.php';
