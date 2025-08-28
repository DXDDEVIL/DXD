<?php
#$me = "20";
#$you = "1525";
#echo "$me is less than $you";
#if ($me < $you) {
#    echo " and $me is less than $you.";
#} elseif ($me == $you) {
#    echo " but $me is not less than $you.";
#}


$o = array("Abhishek", "Anjali", "Rahul", "Sita");

for ($i = 0; $i < count($o); $i++) {
    echo "<br>Element at index $i is: " . $o[$i] . "<br>";
}



function helloMsg() {
    echo "Hello world!";
}
helloMsg(); // call the function

?>