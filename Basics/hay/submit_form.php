<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $languages = isset($_POST['languages']) ? $_POST['languages'] : [];

    $formData = [
        'Name' => $name,
        'Age' => $age,
        'Email' => $email,
        'Weight' => $weight,
        'Height' => $height,
        'Languages' => $languages
    ];

    $heightInMeters = $height / 100;
    $bmi = $weight / ($heightInMeters * $heightInMeters);

    $filteredLanguages = [];
    for ($i = 0; $i < count($languages); $i++) {
        if (strtoupper(substr($languages[$i], 0, 1)) === 'J') {
            continue;
        }
        $filteredLanguages[] = $languages[$i];
    }

    echo "<h2>Submitted Data:</h2>";
    echo "<ul>";
    foreach ($formData as $key => $value) {
        if ($key == 'Languages') {
            echo "<li>"."Language :"."</li>";
            foreach ($value as $l) {
                echo "$l ";
            }
        } else {
            echo "<li>$key: $value</li>";
        }
    }
    echo "</ul>";

    $languageCount = count($languages);
    echo "<p><strong>Number of languages selected:</strong> $languageCount</p>";

    echo "<p><strong>Languages selected:</strong> " . "</p>";
    foreach ($languages as $language) {
        echo "$language"." ";
    }


    echo "<p><strong>BMI:</strong> " . number_format($bmi, 2) . "</p>";

    echo "<h2>Filtered Languages :</h2>";
    echo "<ul>";
    foreach ($filteredLanguages as $language) {
        echo "<li>$language</li>";
    }
    echo "</ul>";
}
?>
