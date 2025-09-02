<?php
// $file = fopen("myfile.txt", "a");
// fwrite($file, "Appending this line to the file.\n");
// fclose($file);
// echo "Data appended to the file successfully.";


$file = fopen("myfile.txt", "w");
fwrite($file, "Overwriting the file with this line.\n");
fclose($file);
echo "Data written to the file successfully.";
