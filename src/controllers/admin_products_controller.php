<?php

if (!isset($_SESSION["is_admin"])) {
    header('location: index.php');
    exit(0);
}

$allProducts = $productManager->getAll();

if (isset($_POST['show_hide'])) {
    $productManager->toggleHide($_POST['id']);
} else if (isset($_POST['delete'])) {
    $productManager->deleteOne($_POST['id']);
}

require PATH_VIEWS . 'admin_products.php';