<?php
require_once 'C:\xampp\htdocs\Tlunews\db.php';

class Category
{
    private $db;

    // Constructor để khởi tạo kết nối DB
    public function __construct()
    {
        // Khởi tạo đối tượng Database và lấy kết nối
        $database = new Database();
        $this->db = $database->getConnection(); // Lấy kết nối PDO từ Database
    }

    // Lấy tất cả thể loại
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        $result = $this->db->query($sql);
        return $result->fetchAll();
    }

    // Lấy thể loại theo ID
    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($sql); // Sử dụng PDO để chuẩn bị câu truy vấn
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(); // Trả về 1 thể loại duy nhất hoặc null nếu không có
    }
}

?>
