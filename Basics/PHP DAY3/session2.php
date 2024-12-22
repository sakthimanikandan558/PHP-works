<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Retrieve Session</title>
</head>
<body>
    <h2>Retrieve Session Data</h2>
    <?php
    // Check if the session variable "user" is set
    if (isset($_SESSION["user11"])) {
        echo "Welcome back, " . htmlspecialchars($_SESSION["user11"]) . "!";
    } else {
        echo "Welcome, guest!";
    }
    ?>
</body>
</html>
