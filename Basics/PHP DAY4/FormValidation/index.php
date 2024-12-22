<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name" required>
        <br><br>
        Password: <input type="password" name="password" required>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    $name = $password = "";
    $nameErr = $passwordErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (preg_match("/[0-9]/",$name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
            if (!preg_match("/[0-9]/", $password)) {
                $passwordErr = "Password must contain at least one digit";
            }
        }

        if ($nameErr) {
            echo "<p style='color: red;'>$nameErr</p>";
        }
        if ($passwordErr) {
            echo "<p style='color: red;'>$passwordErr</p>";
        }

        if (empty($nameErr) && empty($passwordErr)) {
            echo "<p style='color: green;'>Form submitted successfully!</p>";
            echo "<h3>Name: " . htmlspecialchars($name) . "</h3>";
            echo "<h3>Password: " . htmlspecialchars($password) . "</h3>";
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
</body>
</html>
