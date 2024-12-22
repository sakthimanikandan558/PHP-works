<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<h1>Arrays</h1>";
    $names1 = array("Sakthi", "Murugan", "Ganesh");
    $names2 = ["Siva", "Rasathi", "Kali"];
    echo $names1[0]."<br>";
    echo $names2[1]."<br>";
    foreach ($names2 as $name) {
        echo $name . " ";
    }
    echo "<h1>Associative Arrays</h1>";
    $person = [
        "first_name" => "Sakthi",
        "last_name" => "Stark",
        "age" => 22
    ];
    echo $person["first_name"]."<br>";
    foreach ($person as $key => $value) {
        echo $key . ": " . $value . "<br>";
    }
    print_r($person);
    echo "<h1>Functions</h1>";
    function evenOdd($number) {
        if ($number % 2 == 0) {
            return "$number is even";
        } else {
            return "$number is odd";
        }
    }
    echo evenOdd(10)."<br>";
    $greet = function($name) {
        echo "Hello, $name!"."<br>";
    };
    
    $greet("Sakthi");
    function sum(...$numbers) {
        $total = 0;
        foreach ($numbers as $num) {
            $total += $num;
        }
        return $total;
    }
    echo sum(1, 2, 3,6,7,3); 
    echo "<h1>Reg Ex</h1>";
    $pattern1 = "/sakthi/";
    $pattern2 = "/stark/";
    $string = "Hello, sakthi!";

    echo preg_match($pattern1, $string)."<br>";
    echo preg_match($pattern2, $string)."<br>";

    $str = "The rain in SPAIN falls mainly on the plains.";
    $pattern = "/ain/i";
    echo preg_match_all($pattern, $str)."<br>";

    $str = "Visit FB!";
    $pattern = "/FB/i";
    echo preg_replace($pattern, "IG", $str)."<br>";


    ?>
</body>
</html>