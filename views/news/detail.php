<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết tin tức</title>
</head>
<body>
    <h1><?php echo $news['title']; ?></h1>
    <p><?php echo $news['content']; ?></p>
    <img src="images/<?php echo $news['image']; ?>" alt="image">
</body>
</html>
