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
            <div>
                <button onclick="document.getElementById('addProductModal').style.display='block'" class="bg-blue-500 text-white px-4 py-2 rounded">Add Product</button>
                <a href="cart.php" class="bg-green-500 text-white px-4 py-2 rounded">View Cart</a>
            </div>
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

    <!-- Add Product Modal -->
    <div id="addProductModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded shadow-md max-w-md w-full">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">Add New Product</h2>
                    <button onclick="document.getElementById('addProductModal').style.display='none'" class="text-gray-500">&times;</button>
                </div>
                <form method="post" action="add_product.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="name">Product Name</label>
                        <input type="text" id="name" name="name" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="description">Description</label>
                        <textarea id="description" name="description" class="w-full border rounded px-3 py-2" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="price">Price</label>
                        <input type="number" step="0.01" id="price" name="price" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Product</button>
                </form>
            </div>
        </div>
    </div>
    <style>
    .modal {
        display: none;
    }
    .modal-active {
        display: block;
    }
    </style>
    <script>
        function openModal() {
            document.getElementById('addProductModal').classList.add('modal-active');
        }
        function closeModal() {
            document.getElementById('addProductModal').classList.remove('modal-active');
        }
    </script>


</body>
</html>
