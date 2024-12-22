<?php
session_start(); // Resume the session

// Check if the session variable is set
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = "Guest";
}
?>

<!DOCTYPE html>
<html>
<body>

<?php
echo "Welcome, " . htmlspecialchars($username) . "!";
?>

<a href="logout.php">Logout</a>

</body>
</html>