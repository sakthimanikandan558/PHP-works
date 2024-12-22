<?php
if (isset($_COOKIE["user22"])) {
    echo "Welcome back, " . htmlspecialchars($_COOKIE["user22"]) . "!";
} else {
    echo "Welcome, guest!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Retrieve Cookie</title>
</head>
<body>
    <h2>Cookie Example</h2>
</body>
</html>
