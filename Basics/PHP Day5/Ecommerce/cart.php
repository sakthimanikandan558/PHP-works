<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Your Cart</h1>
        <div class="bg-white p-4 shadow-md rounded-lg">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">Product Name</th>
                        <th class="py-2">Quantity</th>
                        <th class="py-2">Price</th>
                        <th class="py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = pg_connect("host=localhost dbname=ecom user=postgres password=postgres");
                        $result = pg_query($conn, "SELECT p.name, p.price, c.quantity FROM carts c JOIN products p ON c.product_id = p.id");
                        $total = 0;
                        while ($row = pg_fetch_assoc($result)) {
                            $item_total = $row['price'] * $row['quantity'];
                            $total += $item_total;
                            echo '<tr>';
                            echo '<td class="border px-4 py-2">' . $row['name'] . '</td>';
                            echo '<td class="border px-4 py-2">' . $row['quantity'] . '</td>';
                            echo '<td class="border px-4 py-2">$' . $row['price'] . '</td>';
                            echo '<td class="border px-4 py-2">$' . number_format($item_total, 2) . '</td>';
                            echo '</tr>';
                        }
                        pg_close($conn);
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right font-bold py-2">Total</td>
                        <td class="border px-4 py-2">$<?php echo number_format($total, 2); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</body>
</html>
