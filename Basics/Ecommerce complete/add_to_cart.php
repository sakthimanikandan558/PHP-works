<?php
include 'total_count.php';
$totalQuantity+=100;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $conn = pg_connect("host=localhost dbname=ecom user=postgres password=postgres");

    $result = pg_query($conn, "SELECT * FROM carts WHERE product_id = $product_id");
    if (pg_num_rows($result) > 0) {
        pg_query($conn, "UPDATE carts SET quantity = quantity + 1 WHERE product_id = $product_id");
    } else {
        pg_query($conn, "INSERT INTO carts (product_id, quantity) VALUES ($product_id, 1)");
    }

    pg_close($conn);

    header('Location: index.php');
    exit();
}
?>

