<?php

$ftpr = fopen('myfile.txt', 'r');
// fpassthru($ftpr);
// fclose($ftpr);
if (!$ftpr) {
    echo "Failed to open file.";
} elseif ($ftpr === false) {
    echo "Failed to read file.";
}


$log = fread($ftpr, filesize('myfile.txt'));

echo $log;

fclose($ftpr);
?>
