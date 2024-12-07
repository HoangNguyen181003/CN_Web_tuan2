<?php
require_once 'C:\xampp\htdocs\Tlunews\Models\News.php';

class HomeController {
    public function index() {
        $newsModel = new News();
        $news = $newsModel->getAllNews();
        require_once 'views/home/index.php';
    }

    public function detail() {
        $id = $_GET['id'];
        $newsModel = new News();
        $news = $newsModel->getNewsById($id);
        require_once 'views/news/detail.php';
    }
}
?>
