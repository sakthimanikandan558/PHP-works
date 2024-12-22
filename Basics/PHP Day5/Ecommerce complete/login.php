<?php
session_start();

$conn = pg_connect("host=localhost dbname=ecom user=postgres password=postgres");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = pg_escape_string($conn, $_POST['username']);
    $password = pg_escape_string($conn, $_POST['password']);
    
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = pg_query($conn, $query);

    if (pg_num_rows($result) == 1) {
        $user = pg_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit;
    }else {
        include 'loginhome.php';
        echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4' role='alert'>
                <span class='block sm:inline'>Invalid username or password.</span>
              </div>";    }
}

pg_close($conn);
?>
