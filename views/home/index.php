<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
</head>
<body>
    <h1>Danh sách Tin tức</h1>
    <ul>
        <?php foreach ($news as $item): ?>
            <li><a href="index.php?action=detail&id=<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
