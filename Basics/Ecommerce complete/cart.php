<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Your Cart</h1>
        <div class="bg-white p-4 shadow-md rounded-lg">
            <?php
                $conn = pg_connect("host=localhost dbname=ecom user=postgres password=postgres");
                $result = pg_query($conn, "SELECT p.name, p.price, c.quantity, c.product_id FROM carts c JOIN products p ON c.product_id = p.id");
                $total = 0;
                
                if (pg_num_rows($result) > 0) {
                    echo '<table class="lg:min-w-full bg-white">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th class="py-2">Product Name</th>';
                    echo '<th class="py-2">Quantity</th>';
                    echo '<th class="py-2">Price</th>';
                    echo '<th class="py-2">Total</th>';
                    echo '<th class="py-2">Delete</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    while ($row = pg_fetch_assoc($result)) {
                        $item_total = $row['price'] * $row['quantity'];
                        $total += $item_total;
                        echo '<tr>';
                        echo '<td class="border px-4 py-2">' . ($row['name']) . '</td>';
                        echo '<td class="border px-4 py-2">' . ($row['quantity']) . '</td>';
                        echo '<td class="border px-4 py-2">$' . ($row['price']) . '</td>';
                        echo '<td class="border px-4 py-2">$' . number_format($item_total, 2) . '</td>';
                        echo '<td class="border px-4 py-2">';
                        echo '<form method="post" action="remove_from_cart.php">';
                        echo '<input type="hidden" name="product_id" value="' . ($row['product_id']) . '">';
                        echo '<div class="flex justify-center"><button type="submit" name="remove_from_cart" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded text-center mx-auto">Remove</button></div>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '<tfoot>';
                    echo '<tr>';
                    echo '<td colspan="3"  class="text-right font-bold py-2 px-4">Total</td>';
                    echo '<td class="border px-4 py-2">$' . number_format($total, 2) . '</td>';
                    echo '</tr>';
                    echo '</tfoot>';
                    echo '</table>';
                } else {
                    echo '<p class="text-center text-lg">Your cart is empty.</p>';
                }

                pg_close($conn);
            ?>
        </div>
        <div class="mt-4 flex justify-center">
                <a href="index.php" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded">Go Home</a>
            </div>
    </div>
</body>
</html>

</body>
</html>
