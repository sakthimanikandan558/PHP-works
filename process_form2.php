<!DOCTYPE html>
<html>
<head>
    <title>Form Submission Result</title>
</head>
<body>

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get form data
        $name = $_GET['name'];
        echo "<h1>Submitted Name: $name </h1>";
} else {
    echo "Invalid request method.";
}
?>

</body>
</html>
