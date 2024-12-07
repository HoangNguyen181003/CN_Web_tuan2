<?php
require_once 'C:\xampp\htdocs\Tlunews\db.php';

class News {
    private $conn;
    private $table_name = "news";

    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    public function getAllNews() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNewsById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addNews($title, $content, $image, $category_id) {
        $query = "INSERT INTO " . $this->table_name . " (title, content, image, category_id) VALUES (:title, :content, :image, :category_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
    }

    public function updateNews($id, $title, $content, $image, $category_id) {
        $query = "UPDATE " . $this->table_name . " SET title = :title, content = :content, image = :image, category_id = :category_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
    }

    public function deleteNews($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>
