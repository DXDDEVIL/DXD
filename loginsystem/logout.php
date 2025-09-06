<?php
session_start();
session_unset();
session_destroy();
header("Location: /DXD/loginsystem/login.php");
exit();
