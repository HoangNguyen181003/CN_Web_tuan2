<?php
$newsModel = new News();
$newsModel->deleteNews($_GET['id']);
header('Location: index.php?action=manageNews');
?>
