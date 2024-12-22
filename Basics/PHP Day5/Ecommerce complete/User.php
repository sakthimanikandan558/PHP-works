<?php

class User {
    private $conn;
    private $table_name = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($username, $password, $email, $phoneno) {
        $query = "INSERT INTO " . $this->table_name . " (username, password,email,phoneno) VALUES (:username, :password,:email,:phoneno)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phoneno', $phoneno);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login($username, $password) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                return true;
            }
        }
        return false;
    }

    public function userName($username) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function userEmail($email) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function userNo($phoneno) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE phoneno = :phoneno";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':phoneno', $phoneno);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
?>
