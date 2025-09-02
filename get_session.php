<?php
session_start();
if (!isset($_SESSION["user"])) {
    echo "No session found. Please log in.";
    exit();
}

echo " Your Session category is: " . $_SESSION["category"] . "<br>" . "Your Name is: " . $_SESSION["user"];
