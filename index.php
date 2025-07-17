<?php

$logpath    = __DIR__.'/logs.txt';
$outputpath = __DIR__.'/output.txt';

$logfile = fopen($logpath, 'r');

$ids     = [];
$userids = [];
$pipes   = [];

while (! feof($logfile)) {
    while(($line = fgets($logfile)) !== false) {
        $id       = trim(substr($line, 0, 12));
        $userid   = trim(substr($line, 12, 6));
        $bytestx  = trim(substr($line, 18, 8));
        $bytesrx  = trim(substr($line, 26, 8));
        $datetime = trim(substr($line, 34, 16));

        $bytestx  = number_format((int) $bytestx);
        $bytesrx  = number_format((int) $bytesrx);
        $datetime = DateTime::createFromFormat('Y-m-d H:i', $datetime)->format('D, F, d Y, H:i:00');

        $pipes[]   = sprintf('%s|%s|%s|%s|%s', $userid, $bytestx, $bytesrx, $datetime, $id);
        $ids[]     = $id;
        $userids[] = $userid;
    }
}

fclose($logfile);

natcasesort($ids);
$sortedids = array_values($ids);

$uuids = array_unique($userids);
sort($uuids, SORT_STRING | SORT_NATURAL | SORT_FLAG_CASE);

$outputfile = fopen($outputpath, 'w');

foreach ($pipes as $pipe) {
    fwrite($outputfile, $pipe.PHP_EOL);
}

fwrite($outputfile, PHP_EOL);

foreach ($sortedids as $id) {
    fwrite($outputfile, $id.PHP_EOL);
}

fwrite($outputfile, PHP_EOL);

foreach ($uuids as $index => $uuid) {
    $index += 1;
    $appends = "[$index]$uuid";
    fwrite($outputfile, $appends.PHP_EOL);
}

fclose($outputfile);

$cono = sprintf("\n%s: %s%s\n", 'File processed successfully', "\033[34m\e[4m", $outputpath);

exit($cono);
