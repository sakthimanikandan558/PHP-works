<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include '/home/lenovo/Documents/PHP/Basics/PHP DAY2/Arrays/arrays.php';
    echo "<h1>File Handling</h1>";
    include '/home/lenovo/Documents/PHP/Basics/PHP DAY2/File Handling/read.php';
    echo "<h1>Date and Time</h1>";
    date_default_timezone_set('Asia/Kolkata');
    echo "<h1>"."Today is " . date("Y/m/d") . "</h1>";
    echo "<h1>"."Current time is " . date("H:i:sa") . "</h1>";

    echo "<h1>"."Today is " . date("l") . "</h1>";

    echo "<h1>"."Current month is " . date("F") . "</h1>";

    echo "<h1>"."formatted date is " . date("D, d M Y H:i:s") . "</h1>";

    echo "<h1>"."Current timestamp is " . time() . "</h1>";

    echo "<h1>include</h1>";
    include '/home/lenovo/Documents/PHP/Basics/PHP DAY2/Include/header.php';
    include '/home/lenovo/Documents/PHP/Basics/PHP DAY2/Include/footer.php';
    include '/home/lenovo/Documents/PHP/Basics/PHP DAY2/Date and Time/footer.php';
    include '/home/lenovo/Documents/PHP/Basics/PHP DAY2/Form_handling/form_handle_get.html';
    include '/home/lenovo/Documents/PHP/Basics/PHP DAY2/Form_handling/form_handle_post.html';
    ?>
</body>
</html>