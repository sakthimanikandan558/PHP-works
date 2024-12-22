<!DOCTYPE html>
<html>
<head>
    <title>GET Method Example</title>
</head>
<body>
    <h2>Form Data Received via GET Method</h2>
    <?php
        $name = $_GET['name'];
        $age = $_GET['age'];
        
        echo "Name: " . $name . "<br>";
        echo "Age: " . $age . "<br>";
    ?>
</body>
</html>
