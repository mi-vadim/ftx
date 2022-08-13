<?php

require('vendor/autoload.php');

use FTX\FTX;

// Unauthenticated
$ftx = FTX::create();

// Authenticated
$ftx = FTX::create('key', 'secret');

$markets = $ftx->markets
    ->trades('BTC-0327', 2, new DateTime('2019-12-01'), new DateTime('2019-12-10'));

var_dump($markets);
