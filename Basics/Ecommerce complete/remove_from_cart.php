<?php
$conn = pg_connect("host=localhost dbname=ecom user=postgres password=postgres");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    $remove_query = "DELETE FROM carts WHERE product_id = $product_id";
    pg_query($conn, $remove_query);
}

pg_close($conn);

header("Location: cart.php");
exit();
?>
