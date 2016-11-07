<?php

$fw = $argv[1];

$file = __DIR__ . '/../../.datas/' . $fw . '.log';

$handle = fopen($file, 'r');

$datas = [];
if (!$handle) {
    echo 'FAILED PARSE';

    return;
}
while (!feof($handle)) {
    $data = fgets($handle);

    if (!empty($data) && !empty(unserialize($data))) {
        $datas[] = unserialize($data);
    }
}

file_put_contents(__DIR__ . '/../../.datas/' . $fw . '.json', json_encode($datas, JSON_PRETTY_PRINT));
