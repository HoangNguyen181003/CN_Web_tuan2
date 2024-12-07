<?php
require_once 'C:\xampp\htdocs\Tlunews\db.php';

class User {
    private $conn;
    private $table_name = "users";

    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    public function authenticate($username, $password) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username AND password = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
