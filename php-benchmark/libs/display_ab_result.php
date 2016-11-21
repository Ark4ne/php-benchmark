<?php


$framework = $argv[1];

$path = __DIR__ . '/../../.datas/' . $framework;

$ab_log = file_get_contents($path . '.ab.log');
preg_match('/Complete requests:\s+([\d.]+)/', $ab_log, $complete_req);
preg_match('/Requests per second:\s+([\d.]+)/', $ab_log, $requests_sec);
preg_match('/Failed requests:\s+([\d.]+)/', $ab_log, $failed);

line('', '-');
value('requests/sec', $requests_sec[1]);
value('Failed', $failed[1]);
line('', '-');

