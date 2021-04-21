<?php

require_once './vendor/autoload.php';

use lib\KkOrder\KkOrder;

$kk = new KkOrder();

$result = $kk->run();

echo "您的訂單價錢為: ".$result;