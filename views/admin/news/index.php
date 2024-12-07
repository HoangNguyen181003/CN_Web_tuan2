<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý tin tức</title>
</head>
<body>
    <h1>Danh sách tin tức</h1>
    <a href="index.php?action=addNews">Thêm tin tức mới</a>
    <table>
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Thể loại</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $item): ?>
                <tr>
                    <td><?php echo $item['title']; ?></td>
                    <td>
                        <?php
                        $categoryModel = new Category();
                        $category = $categoryModel->getCategoryById($item['category_id']);
                        echo $category['name'];
                        ?>
                    </td>
                    <td>
                        <a href="index.php?action=editNews&id=<?php echo $item['id']; ?>">Sửa</a>
                        <a href="index.php?action=deleteNews&id=<?php echo $item['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
