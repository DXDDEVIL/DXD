<?php
#$cars = array (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
#);
#echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";

#New Practic of array
$cars = array (
  "Volvo" => array("In stock" => 22, "Sold" => 18),
  "BMW" => array("In stock" => 15, "Sold" => 13),
  "Saab" => array("In stock" => 5, "Sold" => 2),
  "Land Rover" => array("In stock" => 17, "Sold" => 15)
);

echo $cars["Volvo"]["In stock"].": In stock: ".$cars["Volvo"]["In stock"].", sold: ".$cars["Volvo"]["Sold"].".<br>";
?>