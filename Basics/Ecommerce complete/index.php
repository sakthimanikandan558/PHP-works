
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Site</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-red-600">Latest launches in Mobiles</h1>
            <div class="flex items-center space-x-3">
                <button onclick="document.getElementById('addProductModal').style.display='block'" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded">Add Product</button>
                <a href="cart.php">
                    <button class="relative">
                        <div class="w-10 h-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <!-- cart svg -->
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            <?php include '/home/lenovo/Documents/PHP/Basics/Ecommerce complete/total_count.php'; if ($totalQuantity > 0): ?>
                                <span class="bg-red-600 text-white text-xs rounded-full px-2 absolute -top-2 -right-2"><?php echo $totalQuantity; ?></span>
                            <?php endif; ?>
                        </div>
                    </button>
                </a>
            </div>
        </div>
        <div class="grid md:grid-cols-3  gap-4">
            <?php
            $conn = pg_connect("host=localhost dbname=ecom user=postgres password=postgres");
                $result = pg_query($conn, "SELECT * FROM products WHERE deleted = FALSE");
                while ($row = pg_fetch_assoc($result)) {
                    echo '<div class="bg-white p-4 shadow-md rounded-lg">';
                    echo '<div class="flex justify-center"><img src="' . $row['image_url'] . '" alt="' . $row['name'] . '" class="w-60 h-60 mb-4"></div>';
                    echo '<h2 class="text-xl font-bold">' . $row['name'] . '</h2>';
                    echo '<p>' . $row['description'] . '</p>';
                    echo '<p class="text-lg font-semibold">$' . $row['price'] . '</p>';
                    echo '<div class="flex justify-between">';
                    echo '<form method="post" action="add_to_cart.php">';
                    echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                    echo '<button type="submit" class="bg-purple-500 hover:bg-purple-800 text-white px-4 py-2 rounded mt-2">Add to Cart</button>';
                    echo '</form>';
                    echo '<form method="post" action="soft_delete.php" class="mt-2">';
                    echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                    echo '<button type="submit" class="w-10 h-10">
                            <div class="hover:bg-gray-200 rounded-full hover:"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg></div>
                           </button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
                pg_close($conn);
            ?>
        </div>
    </div>

    <div id="addProductModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center h-screen">
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
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="image_url">Image URL</label>
                        <input type="url" id="image_url" name="image_url" class="w-full  border rounded px-3 py-2" required>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
