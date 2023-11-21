<?php
session_start();
include "lib/session.php";
Session::checkSession();
Session::checkPermission("admin");
include_once 'model/category.php';
include_once 'model/product.php';

extract($_REQUEST);
if (isset($act)) {
    switch ($act) {
        case 'dashboard':
            include_once 'view/inc/headerAdmin.php';
            include_once 'view/inc/sidebarAdmin.php';
            include_once 'view/admin/dashboard.php';
            include_once 'view/inc/footer.php';
            break;
        case 'addproduct':
            $classPro = new Product();
            $cate = new Category();
            $allCategory = $cate->getAllCate();

            if (isset($_POST['btn-create-product']) && $_POST['btn-create-product']) {
                // echo 'quynh' . print_r($_FILES['image']);
                echo "quynh nguyen van".$_POST['name'];
                $resAddPro = $classPro->updateProduct(
                    $_POST['name'],
                    $_POST["description"] ,
                    $_POST["categoryId"] ,
                    $_POST["quantity"] ,
                    $_POST["origin"] ,
                    $_POST["brand"] ,
                    $_POST["price"] ,
                    $_POST["salePercent"] ,
                    $_FILES["image"],
                    $_FILES["listimage"] ,
                    $_POST["unit"] 
                );

            }
            include_once 'view/inc/headerAdmin.php';
            include_once 'view/inc/sidebarAdmin.php';
            include_once 'view/admin/addproduct.php';
            include_once 'view/inc/footer.php';
            break;
        case 'manageproduct':
            $classPro = new Product();
            $allProduct = $classPro->getAllProduct();
            include_once 'view/inc/headerAdmin.php';
            include_once 'view/inc/sidebarAdmin.php';
            include_once 'view/admin/manageproduct.php';
            include_once 'view/inc/footer.php';
            break;
        case 'managecategory':
            $cate = new Category();

            if (isset($_POST['create-cate-btn']) && $_POST['create-cate-btn']) {
                $createCate = $cate->createNewCate($_POST['name'], $_FILES['image']);
            }
            if (isset($_POST['delete-cate']) && $_POST['delete-cate']) {
                $createCate = $cate->deleteCate($_POST['idcate']);
            }


            $allCategory = $cate->getAllCate();
            include_once 'view/inc/headerAdmin.php';
            include_once 'view/inc/sidebarAdmin.php';
            include_once 'view/admin/managecategory.php';
            include_once 'view/inc/footer.php';
            break;
        case 'manageorder':
            include_once 'view/inc/headerAdmin.php';
            include_once 'view/inc/sidebarAdmin.php';
            include_once 'view/admin/manageorder.php';
            include_once 'view/inc/footer.php';
            break;
        default:
            header('Location: ?page=404');

        // include_once 'view/inc/headerAdmin.php';
        // include_once 'view/error.php';
        // include_once 'view/inc/footer.php';
    }
}

?>