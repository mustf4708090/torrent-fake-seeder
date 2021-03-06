<?php

require_once('vendor/autoload.php');

use Devitek\Net\Torrent\Client\Azureus\Azureus45;
use Devitek\Net\Torrent\Seeder;
use Devitek\Net\Torrent\Torrent;

$torrent = new Torrent('file.torrent');
$client  = new Azureus45();
$seeder  = new Seeder($client, $torrent);

$seeder->bind('update', function ($data) {
    echo $data['uploaded'] . ' MB at ' . $data['speed'] . ' MB/sec uploaded' . PHP_EOL;
});

$seeder->bind('error', function ($data) {
    echo $data['exception']->getMessage() . PHP_EOL;
});

$seeder->seed();
