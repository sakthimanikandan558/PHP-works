<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $conn = pg_connect("host=localhost dbname=ecom user=postgres password=postgres");

    // Check if product is already in the cart
    $result = pg_query($conn, "SELECT * FROM carts WHERE product_id = $product_id");
    if (pg_num_rows($result) > 0) {
        // If product is already in the cart, increase the quantity
        pg_query($conn, "UPDATE carts SET quantity = quantity + 1 WHERE product_id = $product_id");
    } else {
        // If product is not in the cart, add it with quantity 1
        pg_query($conn, "INSERT INTO carts (product_id, quantity) VALUES ($product_id, 1)");
    }

    pg_close($conn);

    // Redirect back to the main page
    header('Location: index.php');
    exit();
}
?>
