    <?php
    session_start();

    if (isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        header("Location: /DXD/loginsystem/login.php");
        exit();
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
        <?php require 'partials/_navbar.php'; ?>
    </head>

    <body>
        <h1>Welcome to iSecure <?php echo $_SESSION['username']; ?></h1>
        we would like to offer you our best services to enhance your online security and privacy.
        <ul>
            <li>Password Management</li>
            <li>Two-Factor Authentication</li>
            <li>Secure Cloud Storage</li>
        </ul>
        <p>Thank you for choosing iSecure. We are committed to providing you with the best security solutions <?php echo $_SESSION['username']; ?>.</p>


    </body>

    </html>