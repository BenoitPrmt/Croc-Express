<?php

if (!empty($_POST)) {
    if (isset($_POST['name']) && isset($_POST['description'])) {
        $_POST['isHidden'] = isset($_POST['isHidden']) ? 1 : 0;
        $category = $categoryManager->getOne($_POST['id']);

        if (!empty($_FILES['image']['name'])) {
            $targetDir = '../public/assets/product_images/';
            $targetFile = $targetDir . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
            $category = new Category([
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'isHidden' => $_POST['isHidden'],
                'image' => $_FILES['image']['name'],
            ]);
            $categoryManager->editOne($category);
        } else if (empty($_FILES['image'])) {
            $categoryObject = new Category(
                [
                    'id' => $_POST['id'],
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'isHidden' => $_POST['isHidden'],
                    'image' => $_POST['currentImage'],
                ]
            );
            $categoryManager->editOne($categoryObject);
        }
        ob_clean();
        header('location: index.php?page=admin_categories');
        exit(0);
    }
}



$category = $categoryManager->getOne($_POST['id']);
require PATH_VIEWS . 'admin/admin_edit_category.php';