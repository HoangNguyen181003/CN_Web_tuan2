<?php
require_once 'C:\xampp\htdocs\Tlunews\Controller\HomeController.php';
require_once 'C:\xampp\htdocs\Tlunews\Controller\AdminController.php';
require_once 'C:\xampp\htdocs\Tlunews\Controller\NewsController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$controller = null;

if ($action == 'index' || $action == 'detail') {
    $controller = new HomeController();
    $controller->{$action}();
} elseif ($action == 'login' || $action == 'dashboard' || $action == 'manageNews' || $action == 'addNews' || $action == 'editNews' || $action == 'deleteNews') {
    $controller = new AdminController();
    $controller->{$action}();
}
?>
