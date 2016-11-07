<?php
global $framework;

file_put_contents(
    __DIR__ . '/../../.datas/' . $framework . '.log',
    serialize([
        'm' => memory_get_usage(),
        'p' => memory_get_peak_usage(),
        't' => microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']
    ]) . PHP_EOL,
    FILE_APPEND
);
