<!DOCTYPE html>
<html>
<head>
    <title>POST Method Example</title>
</head>
<body>
    <h2>Form Data Received via POST Method</h2>
    <?php
        $name = $_POST['name'];
        $age = $_POST['age'];
        
        echo "Name: " . $name . "<br>";
        echo "Age: " . $age . "<br>";
    ?>
</body>
</html>
