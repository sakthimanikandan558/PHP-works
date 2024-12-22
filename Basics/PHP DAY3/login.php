<?php
session_start(); // Start the session

// Check if the form is submitted
if (isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username']; // Set session variable
    header("Location: welcome.php"); // Redirect to the welcome page
    exit();
}
?>

<!DOCTYPE html>
<html>
<body>

<form method="post" action="login.php">
    <label for="username">Enter your name:</label>
    <input type="text" id="username" name="username" required>
    <input type="submit" value="Login">
</form>

</body>
</html>