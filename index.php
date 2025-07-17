<?php

// file for
// reading: logs.txt
// writing: output.txt

// 1st step
// stream the reading file, 8KB at a time
// format each row into <UserID>|<BytesTX|<BytesRX|<DateTime>|<ID>
// append to writing file
// store in array for 2nd step
// repeat

// add a breakline to the file

// 2nd step
// perform bubble sort of the IDs and store in array
// loop through the sorted array and append to the writing file

// add a breakline to the file

// 3rd step
// perform bubble sort of the UserIDs and store in array
// loop through the sorted array and append to the writing file

$path = __DIR__.'/logs.txt';

if (! file_exists($path)) die('File not found!');

$file = fopen($path, 'rb');

while (! feof($file)) {
    var_dump(fread($file, 8192));
}

fclose($file);
