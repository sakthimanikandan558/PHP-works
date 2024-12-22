<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple E-commerce Site</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold">Products</h1>
            <a href="cart.php" class="bg-green-500 text-white px-4 py-2 rounded">View Cart</a>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <?php
                $conn = pg_connect("host=localhost dbname=ecom user=postgres password=postgres");
                $result = pg_query($conn, "SELECT * FROM products");
                while ($row = pg_fetch_assoc($result)) {
                    echo '<div class="bg-white p-4 shadow-md rounded-lg">';
                    echo '<h2 class="text-xl font-bold">' . $row['name'] . '</h2>';
                    echo '<p>' . $row['description'] . '</p>';
                    echo '<p class="text-lg font-semibold">$' . $row['price'] . '</p>';
                    echo '<form method="post" action="add_to_cart.php">';
                    echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                    echo '<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Add to Cart</button>';
                    echo '</form>';
                    echo '</div>';
                }
                pg_close($conn);
            ?>
        </div>
    </div>

</body>
</html>
