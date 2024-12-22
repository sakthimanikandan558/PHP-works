<?php
echo "<h2>Namespace</h2>";
include '/home/lenovo/Documents/PHP/Basics/PHP DAY4/Namespace/all_file.php';
include 'db_conn.php';
$host = 'localhost'; 
$dbname = 'mynewdb';
$user = 'postgres'; 
$pass = 'postgres'; 

try {
    $dsn = "pgsql:host=$host;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
        INSERT INTO users (username, email,salary)
        VALUES
            ('Sakthi', 'Sakthi@gmail.com',50000),
            ('Siva', 'Siva@gmail.com',50000),
            ('Murugan', 'Murgan@gmail.com',32000),
            ('Kali', 'Kali@gmail.com',45000),
            ('Rasathi', 'Rasathi@gmail.com',40000),
            ('Ganesh', 'Ganesh@gmail.com',35000);";

    $pdo->exec($sql);

    echo "<h2>Data inserted successfully into the 'users' table!</h2>";

    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);

    echo "<h2>Select Data</h2>";

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $user) {
        echo '<div style="background-color: #f0f0f0; padding: 10px; margin-bottom: 5px; display: inline-block;width:550px">';
        echo 'ID: <span style="color: #333;">' . $user['id'] . '</span> - ';
        echo 'Username: <span style="color: #333;">' . $user['username'] . '</span> - ';
        echo 'Email: <span style="color: #333;">' . $user['email'] . '</span>';
        echo 'Salary: <span style="color: #333;">' . $user['salary'] . '</span>';
        echo '</div>';
        echo '<br>';
        }

    $lastId = $pdo->lastInsertId();
    echo "<h2>Last inserted ID is: " . $lastId."</h2>";
    
    $sqlSelect = "
    SELECT * FROM users
    WHERE salary >= 40000";

    $stmt1 = $pdo->prepare($sqlSelect);
    $stmt1->execute();

    $users = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>SQL Where</h2>";

    foreach ($users as $user) {
        echo '<div style="background-color: #f0f0f0; padding: 10px; margin-bottom: 5px; display: inline-block;width:550px">';
        echo 'ID: <span style="color: #333;">' . $user['id'] . '</span> - ';
        echo 'Username: <span style="color: #333;">' . $user['username'] . '</span> - ';
        echo 'Email: <span style="color: #333;">' . $user['email'] . '</span> - ';
        echo 'Salary: <span style="color: #333;">' . $user['salary'] . '</span>';
        echo '</div>';
        echo '<br>';
    }

    $sqlOrder = "
    SELECT * FROM users
    ORDER BY salary desc";

    $stmt2 = $pdo->prepare($sqlOrder);
    $stmt2->execute();

    $users = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>SQL Order BY</h2>";

    foreach ($users as $user) {
        echo '<div style="background-color: #f0f0f0; padding: 10px; margin-bottom: 5px; display: inline-block;width:550px">';
        echo 'ID: <span style="color: #333;">' . $user['id'] . '</span> - ';
        echo 'Username: <span style="color: #333;">' . $user['username'] . '</span> - ';
        echo 'Email: <span style="color: #333;">' . $user['email'] . '</span> - ';
        echo 'Salary: <span style="color: #333;">' . $user['salary'] . '</span>';
        echo '</div>';
        echo '<br>';
    }

    echo "<h2>SQL Delete</h2>";

    $sqlDel = "
        DELETE FROM users WHERE username='Kali';";

    $stmt3 = $pdo->prepare($sqlDel);
    $stmt3->execute();

    // $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql1 = "SELECT * FROM users";
    $stmt4 = $pdo->query($sql1);
    $users = $stmt4->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        echo '<div style="background-color: #f0f0f0; padding: 10px; margin-bottom: 5px; display: inline-block;width:550px">';
        echo 'ID: <span style="color: #333;">' . $user['id'] . '</span> - ';
        echo 'Username: <span style="color: #333;">' . $user['username'] . '</span> - ';
        echo 'Email: <span style="color: #333;">' . $user['email'] . '</span> - ';
        echo 'Salary: <span style="color: #333;">' . $user['salary'] . '</span>';
        echo '</div>';
        echo '<br>';
    }
    
    echo "<h2>SQL Update</h2>";

    $sqlUpdate = "
        UPDATE users SET salary=39000 WHERE username='Ganesh';";

    $stmt4 = $pdo->prepare($sqlUpdate);
    $stmt4->execute();

    // $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = "SELECT * FROM users";
    $stmt5 = $pdo->query($sql2);
    $users = $stmt5->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        echo '<div style="background-color: #f0f0f0; padding: 10px; margin-bottom: 5px; display: inline-block;width:550px">';
        echo 'ID: <span style="color: #333;">' . $user['id'] . '</span> - ';
        echo 'Username: <span style="color: #333;">' . $user['username'] . '</span> - ';
        echo 'Email: <span style="color: #333;">' . $user['email'] . '</span> - ';
        echo 'Salary: <span style="color: #333;">' . $user['salary'] . '</span>';
        echo '</div>';
        echo '<br>';
    }
    
    
} catch (PDOException $e) {
    echo "Error inserting data: " . $e->getMessage();
}
?>
