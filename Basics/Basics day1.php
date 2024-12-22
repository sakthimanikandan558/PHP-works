<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
    <?php
    //Variables
    echo "<h1>Variables</h1>";
    $no1=5;
    $no2=6;
    echo "<p>". $no1+$no2 . "</p>";
    $str1="SAKTHI<br>";
    echo $str1;
    var_dump($str1);
    //Scope
    echo "<h1>Function Scope</h1>";
    function myFunction() {
        $localVar = "I'm a local variable<br>";
        echo $localVar;
    }
    myFunction();
    $globalVar = "I'm a global variable<br>";

    function myFunction1() {
        global $globalVar;
        echo $globalVar; 
    }

    myFunction1();

    // echo vs print
    echo "<h1>Echo VS Print</h1>";
    echo "Hello world!<br>";
    $arr1=array(1,2,"stark");
    print_r($arr1);

    //Data Types
    echo "<h1>Data Types</h1>";
    $x = 5;
    var_dump($x);
    $x = 10.365;
    var_dump($x);

    //String 
    echo "<h1>String</h1>";
    echo strlen($str1);
    echo "<br>";
    echo str_word_count("Hello world!");
    echo "<br>";
    $x = "Hello World!";
    echo strtolower($x);
    echo "<br>";
    echo strrev($x)."<br>";
    //Concate
    echo "<h1>Concate</h1>";
    echo "Hello ".$str1;
    echo "Hello $str1";
    //substring
    echo "<h1>Substring</h1>";
    echo substr($x, 6, 5)."<br>";
    echo substr($x, 6)."<br>";

    //Numbers
    echo "<h1>Numbers</h1>";
    $Imax=PHP_INT_MAX;
    echo $Imax."<br>";
    $Fmin=PHP_FLOAT_MIN;
    echo $Fmin."<br>";
    $num1 = 10.365;
    var_dump(is_float($num1));
    $num2 = "5";
    var_dump(is_int($num2));

    //Casting
    echo "<h1>Casting</h1>";
    $var = "123";
    $intVar = (int)$var;
    echo $intVar."<br>"; 
    var_dump($intVar)."<br>";
    $varstr1="sakthi";
    $intVar2=(int)$varstr1;
    echo $intVar2."<br>";
    $var = 1;
    $boolVar = (bool)$var;
    var_dump($boolVar);
    $var = 0;
    $boolVar = (bool)$var;
    var_dump($boolVar);
    $var = "123";
    $arrayVar = (array)$var;
    var_dump($arrayVar);

    $intVar = 123;
    $arrayVar = (array)$intVar;
    var_dump($arrayVar);

    //Math
    echo "<h1>Math</h1>";
    echo "Absolute value: " . abs(-7) . "<br>";
    echo "Ceil: " . ceil(8.7) . "<br>";
    echo "Floor: " . floor(8.7) . "<br>";
    echo "Round: " . round(9.4) . "<br>";
    echo "Power: " . pow(2, 4) . "<br>";
    echo "Square root: " . sqrt(16) . "<br>";

    //Constants
    echo "<h1>Constants</h1>";
    define('PI', 3.14);
    echo "PI: " . PI . "<br>";
    const my_name = "Sakthi";
    echo "my_name: " . my_name . "<br>";

    // define('GREETING', 'Hello, World!', true);
    // echo "Greeting: " . GREETING . "<br>";
    // echo "Greeting (case insensitive): " . greeting . "<br>"; 

    //Magic constants
    echo "<h1>Magic constants</h1>";
    echo "This is line " . __LINE__ . "<br>";

    echo "The full path of this file is " . __FILE__ . "<br>";

    echo "The directory of this file is " . __DIR__ . "<br>";

    function myFunction2() {
        echo "The function name is " . __FUNCTION__ . "<br>";
    }
    myFunction2();

    class MyClass {
        public function myMethod() {
            echo "The class name is " . __CLASS__ . "<br>";
            echo "The method name is " . __METHOD__ . "<br>";
        }
    }
    $myClassInstance = new MyClass();
    $myClassInstance->myMethod();


    //Operators
    echo "<h1>Operators</h1>";
    echo "<h1>Comparison</h1>";
    $a = 5;
    $b = "5";
    echo "Equal: " . var_export($a == $b, true) . "<br>"; 
    echo "Identical: " . var_export($a === $b, true) . "<br>"; 
    echo "Not Equal: " . var_export($a != $b, true) . "<br>";
    echo "Not Identical: " . var_export($a !== $b, true) . "<br>";

    echo "<h1>Conditional Assignment </h1>";

    $a = 5;
    $b = ($a == 5) ? "Equal" : "Not equal";
    echo "Ternary: " . $b . "<br>"; 

    $c = null;
    $d = $c ?? "Default value";
    echo "Null Coalescing: " . $d . "<br>";

    echo "<h1>String Operators </h1>";

    $a = "Hello";
    $b = "Sakthi";

    echo "Concatenation: " . $a . " " . $b . "<br>";

    $a .= " World";
    echo "Concatenation Assignment: " . $a . "<br>"; 
    ?>

    </pre>

</body>
</html>