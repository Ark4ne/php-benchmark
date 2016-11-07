<?php

function line($str, $pad = ' ')
{
    echo '+' . str_pad($str, 78, $pad) . '+' . PHP_EOL;
}

function value($name, $value)
{
    line('    ' . $name . ' : ' . $value);
}

function value_memory($name, $value)
{
    $base     = log($value, 1024);
    $suffixes = ['', 'K', 'M', 'G', 'T'];

    $value = round(pow(1024, $base - floor($base)), 3) . ' ' . $suffixes[(int)floor($base)];

    value($name, $value);
}

function value_time($name, $value)
{
    $base = floor($value * 1000 * 1000) / 1000; // us

    $value = $base . ' ms';

    value($name, $value);
}

$framework = $argv[1];

//$frameworks = ['invo', 'slayer', 'laravel', 'phalcon'];

//foreach ($frameworks as $framework) {
$path = __DIR__ . '/../../.datas/' . $framework;

$data_requests = json_decode(file_get_contents($path . '.json'), true);

$total_request = 0;

$total_memory = 0;
$min_memory   = INF;
$max_memory   = 0;

$total_memory_peak = 0;
$min_memory_peak   = INF;
$max_memory_peak   = 0;

$total_time = 0;
$min_time   = INF;
$max_time   = 0;

foreach ($data_requests as $data_request) {
    if (!is_array($data_request)) {
        continue;
    }

    $total_request++;

    $total_memory += $data_request['m'];
    $total_memory_peak += $data_request['p'];
    $total_time += $data_request['t'];

    if ($data_request['t'] > $max_time) {
        $max_time = $data_request['t'];
    }
    if ($data_request['t'] < $min_time) {
        $min_time = $data_request['t'];
    }
    if ($data_request['p'] > $max_memory_peak) {
        $max_memory_peak = $data_request['p'];
    }
    if ($data_request['p'] < $min_memory_peak) {
        $min_memory_peak = $data_request['p'];
    }
    if ($data_request['m'] > $max_memory) {
        $max_memory = $data_request['m'];
    }
    if ($data_request['m'] < $min_memory) {
        $min_memory = $data_request['m'];
    }
}

$ab_log = file_get_contents($path . '.ab.log');
preg_match('/Requests per second:\s+([\d.]+)/', $ab_log, $requests_sec);
preg_match('/Failed requests:\s+([\d.]+)/', $ab_log, $failed);

line('', '-');
value('requests/sec', $requests_sec[1]);
value('Failed', $failed[1]);
value_time('avg. time', $total_time / $total_request);
value_time('min time', $min_time);
value_time('max time', $max_time);
value_memory('avg. memory', $total_memory_peak / $total_request);
value_memory('min memory', $min_memory_peak);
value_memory('max memory', $max_memory_peak);
line('', '-');

