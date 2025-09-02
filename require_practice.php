<?php
// include '_dbconnect.php';
require '_dbconnect.php';

$sql = "SELECT * FROM `note title`";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['title'] . " " . $row['s_no'] . " " . $row['description'] . " " . $row["timestmp"] . "<br>";
}

?>