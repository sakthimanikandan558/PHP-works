<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // echo readfile("ex.txt")
    $filename = "ex.txt";

// Open the file for writing. If the file doesn't exist, create it.
    $file = fopen($filename, "w");
    $file2 = fopen($filename, "a+");
    $file3 = fopen($filename, "r+");
    fwrite($file, "Hello, World!");
    fwrite($file2, "HIIII!");
    fwrite($file3, "TODAY");
    $myfile = fopen("ex.txt", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("ex.txt"));
    fclose($myfile);
    $file = fopen($filename, "r");
    echo readfile("ex.txt");
    echo fread($file2,9);
    echo $var1  ;
    fclose($var)

    ?>
</body>
</html>