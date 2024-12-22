<?php
session_start();
$user=$_SESSION['user_id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $conn = pg_connect("host=localhost dbname=ecom user=postgres password=postgres");

    $result = pg_query($conn, "SELECT * FROM carts WHERE product_id = $product_id AND userid=$user");
    if (pg_num_rows($result) > 0) {
        pg_query($conn, "UPDATE carts SET quantity = quantity + 1 WHERE product_id = $product_id AND userid=$user");
    } else {
        pg_query($conn, "INSERT INTO carts (product_id, quantity,userid) VALUES ($product_id, 1,$user)");
    }

    $cartResult = pg_query($conn, "SELECT total FROM countval WHERE id=1");
    $cartRow = pg_fetch_assoc($cartResult);
    $totalQuantity = $cartRow['total']+1;
    $cartResult = pg_query($conn, "UPDATE countval SET total=$totalQuantity  WHERE id=1");


    pg_close($conn);

    header('Location: index.php');
    exit();
}
?>

