<?php
require_once 'C:\xampp\htdocs\Tlunews\Models\News.php';

class NewsController {
    public function index() {
        $newsModel = new News();
        $news = $newsModel->getAllNews();
        require_once 'views/news/index.php';
    }
}
?>
