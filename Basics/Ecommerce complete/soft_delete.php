<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $conn = pg_connect("host=localhost dbname=ecom user=postgres password=postgres");

    $query = "UPDATE products SET deleted = TRUE WHERE id = $product_id";
    $result = pg_query($conn, $query);

    $deleteCartQuery = "DELETE FROM carts WHERE product_id = $product_id";
    $deleteCartResult = pg_query($conn, $deleteCartQuery);

    pg_close($conn);

    header('Location: index.php');
    exit();
}
?>
