<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $languages = isset($_POST['languages']) ? $_POST['languages'] : [];

    // Create associative array
    $formData = [
        'name' => $name,
        'age' => $age,
        'email' => $email,
        'languages' => $languages
    ];

    // Print associative array for debugging
    echo "<pre>";
    print_r($formData);
    echo "</pre>";

    // Optional: Store data in a session or database
    // For now, we'll just display the data on the page
}
?>
