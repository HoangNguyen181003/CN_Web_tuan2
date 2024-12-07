<?php
require_once 'C:\xampp\htdocs\Tlunews\Models\User.php';
require_once 'C:\xampp\htdocs\Tlunews\Models\News.php';
require_once 'C:\xampp\htdocs\Tlunews\Models\Category.php';

class AdminController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userModel = new User();
            $user = $userModel->authenticate($username, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                header('Location: index.php?action=dashboard');
            } else {
                echo "Sai tên đăng nhập hoặc mật khẩu!";
            }
        }

        require_once 'views/admin/login.php';
    }

    public function dashboard() {
        require_once 'views/admin/dashboard.php';
    }

    public function manageNews() {
        $newsModel = new News();
        $news = $newsModel->getAllNews();
        require_once 'views/admin/news/index.php';
    }

    public function addNews() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];
            
            $newsModel = new News();
            $newsModel->addNews($title, $content, $image, $category_id);
            header('Location: index.php?action=manageNews');
        }

        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategories();
        require_once 'views/admin/news/add.php';
    }

    public function editNews() {
        $id = $_GET['id'];
        $newsModel = new News();
        $news = $newsModel->getNewsById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];
            $newsModel->updateNews($id, $title, $content, $image, $category_id);
            header('Location: index.php?action=manageNews');
        }

        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategories();
        require_once 'views/admin/news/edit.php';
    }

    public function deleteNews() {
        $id = $_GET['id'];
        $newsModel = new News();
        $newsModel->deleteNews($id);
        header('Location: index.php?action=manageNews');
    }
}
?>
