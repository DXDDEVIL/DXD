<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include($_SERVER['DOCUMENT_ROOT'] . '/DXD/loginsystem/partials/_dbconnect.php');

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    // Check whether this username exists
    $existSql = "SELECT * FROM `users` WHERE userName = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        // $showError = "Username Already Exists";
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Username Already Exists.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    } elseif ($numExistRows == 0) {
        $existSql = "SELECT * FROM `users` WHERE email = '$email'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if ($numExistRows > 0) {
            // $showError = "Email Already Exists";
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Email Already Exists.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        } else {
            if (($password == $cpassword)) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` ( `userName`, `email`, `pass`, `s_no`) VALUES ( '$username', '$email', '$hash', NULL)";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    // $showAlert = true;
                    header("Location: /DXD/loginsystem/signup.php?signupsuccess=true");
                    exit();
                }
            } else {
                // $showError = "Passwords do not match";
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Passwords do not match.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfully signed up</title>
    <?php require 'partials/_navbar.php'; ?>
</head>

<body>
    <?php
    if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Signup Successfully</strong> Lets Proceed Ahead.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>

    </div>
    <div class="container">
        <h2 class="text-center">Signup to our Website</h2>
        <form action="signup.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" maxlength="10" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" maxlength="50" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                <small>Make sure your passwords match</small>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>

    </div>
</body>

</html>