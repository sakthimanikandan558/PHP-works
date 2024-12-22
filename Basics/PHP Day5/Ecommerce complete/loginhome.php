<?php


// $conn = pg_connect("host=localhost dbname=ecom user=postgres password=postgres");

// if (!$conn) {
//     die("Connection failed: " . pg_last_error());
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $username = pg_escape_string($conn, $_POST['username']);
//     $password = pg_escape_string($conn, $_POST['password']);
    
//     $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
//     $result = pg_query($conn, $query);

//     if (pg_num_rows($result) == 1) {
//         $user = pg_fetch_assoc($result);
//         $_SESSION['user_id'] = $user['id'];
//         $_SESSION['username'] = $user['username'];
//         header("Location: index.php");
//         exit;
//     } else {
//         echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
//                 <strong class='font-bold'>Error!</strong>
//                 <span class='block sm:inline'>Invalid username or password.</span>
//               </div>";
//     }
// }

// pg_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container max-w-md mx-auto px-4 py-8">
        <h1 class="text-3xl mb-4 text-center">Login</h1>
        <form action="login.php" method="post" class="bg-white p-6 rounded shadow-md">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Login</button>
        </form>
        <div class="mt-4">
            <a href="register.html" class="bg-green-500 text-white px-4 py-2 rounded">Click to Register</a>
        </div>
    </div>
</body>
</html>
