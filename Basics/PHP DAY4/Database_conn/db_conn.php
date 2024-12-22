<?php
$host = 'localhost'; 
$dbname = 'Exercise'; 
$user = 'postgres';
$pass = 'postgres'; 

try {
    $dsn = "pgsql:host=$host;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h2>Connected successfully to the database!<h2>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
