<?php
use Workerman\Worker;

require_once __DIR__ . '/vendor/autoload.php';

$udp_worker = new Worker("udp://127.0.0.1:9090");

$udp_worker->onMessage = function ($connection, $data) {
    $connection->send('udp ' . $data);
};

Worker::runAll();