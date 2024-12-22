<?php
// Connection details
$host = 'localhost'; 
$user = 'postgres';
$pass = 'postgres'; 

$newDb = 'mynewdb'; 

try {
    $dsn = "pgsql:host=$host";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE $newDb";
    $pdo->exec($sql);

    echo "Database '$newDb' created successfully!";
} catch (PDOException $e) {
    echo "Error creating database: " . $e->getMessage();
}
?>
