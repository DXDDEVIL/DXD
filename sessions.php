<?php
session_start();
$_SESSION["user"] = "John Doe";
$_SESSION["category"] = "General";

echo "Session variables are set.";
