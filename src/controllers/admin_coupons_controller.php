<?php

if (isset($_POST['delete'])) {
    $couponManager->deleteOne($_POST['id']);
    header("location: index.php?page=admin_coupons");
    exit;
}

$allCoupons = $couponManager->getAll();

require PATH_VIEWS . 'admin_coupons.php';