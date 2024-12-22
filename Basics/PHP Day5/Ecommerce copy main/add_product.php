<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    $conn = pg_connect("host=localhost dbname=ecom user=postgres password=postgres");

    $query = "INSERT INTO products (name, description, price, image_url) VALUES ($1, $2, $3, $4)";
    $result = pg_query_params($conn, $query, array($name, $description, $price, $image_url));

    pg_close($conn);

    header('Location: index.php');
    exit();
}
?>
