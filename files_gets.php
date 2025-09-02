<?php

$ftrp = fopen("myfile.txt", "r");
// you will get each line if you use fgets in reading mode output
// echo fgets($ftrp) . "</br>";
// echo fgets($ftrp) . "</br>";


// Now you can use a loop to read all lines
while (($line = fgets($ftrp)) !== false) {
    echo $line . "</br>";
}

fclose($ftrp);
