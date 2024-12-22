<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Accounts Table</title>
</head>
<body>

<?php
$host = "localhost";
$port = "5432";
$dbname = "Exercise";
$user = "postgres";
$password = "postgres";

// Create connection string
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Establish a connection
$conn = pg_connect($conn_string);

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
echo "Connected successfully<br>";

// Define the query to fetch data from the accounts table
$query = "SELECT * FROM accounts";

// Execute the query
$result = pg_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

// Generate HTML table to display the data
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Balance</th></tr>"; // Adjust column headers based on your table structure

// Loop through the result set and print each row
while ($row = pg_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>"; // Adjust 'id' to your column name
    echo "<td>" . htmlspecialchars($row['name']) . "</td>"; // Adjust 'name' to your column name
    echo "<td>" . htmlspecialchars($row['balance']) . "</td>"; // Adjust 'email' to your column name
    echo "</tr>";
}

echo "</table>";

// Free result set
pg_free_result($result);
// print_r $result;
// echo "$result";

// Close the connection
pg_close($conn);
?>

</body>
</html>

</body>
</html>