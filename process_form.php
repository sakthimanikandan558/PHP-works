<!DOCTYPE html>
<html>
<head>
    <title>Form Submission Result</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
// Define your PostgreSQL database credentials
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $balance = $_POST['balance'];

    // Prepare SQL query to insert data into the 'accounts' table
    $query = "INSERT INTO accounts (name, balance) VALUES ('$name','$balance')";
    $result = pg_query($conn, $query);
    echo "Data inserted successfully.";
    // $result = pg_query_params($conn, $query, array($name, $balance));

    // // Check if the insert was successful
    // if ($result) {
    //     echo "Data inserted successfully.";
    // } else {
    //     echo "Error in SQL query: " . pg_last_error();
    // }

    // // Free result
    // pg_free_result($result);
}

$query = "SELECT id, name, balance FROM accounts";
$result = pg_query($conn, $query);
// echo $result;
print_r($result);
echo "<br>"; 

// Check if the query was successful
if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

// Display data in an HTML table
echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Balance</th></tr>";

while ($row = pg_fetch_assoc($result)) {
    print_r($row);
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['balance']) . "</td>";
    echo "</tr>";
}

echo "</table>";

// Free result
pg_free_result($result);

// Close the connection
pg_close($conn);
?>

</body>
</html>
