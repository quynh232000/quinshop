<?php

include_once 'model/category.php';
include_once 'model/product.php';
include_once 'model/entity.php';
include_once "model/cart.php";
$classCart = new Cart();
$getCartInfo = $classCart->getCartView();
extract($_REQUEST);
if (isset($act)) {
    switch ($act) {
        case 'home':
            $cate = new Category();
            $product = new Product();
            $allCategory = $cate->getAllCate();
            if ($allCategory == false) {
                $allCategory = array();
            }
            $megaPro = $product->filterProduct("random");
            $newPro = $product->filterProduct("", "", 8);
            $salePro = $product->filterProduct("random");
            $bestPro = $product->filterProduct("random", "", 10);
            $suggestionPro = $product->filterProduct("random", "", 12);
            //    add cart
            // if (isset($_GET['type']) && isset($_GET['idpro']) && !empty($_GET['type']) && !empty($_GET['idpro'])) {

            //     $json = json_encode(new Response(  true,"successfully","",""), JSON_PRETTY_PRINT);
            //     echo $json;
            //     return ;

            // }



            include_once 'view/inc/header.php';
            include_once 'view/home.php';
            include_once 'view/inc/footer.php';
            break;
        case 'collection':
            $cate = new Category();
            $product = new Product();
            if (isset($_GET['category']) && !empty($_GET['category'])) {
                $collectionPro = $product->filterProduct("category", $_GET['category']);
                $infoCate = $cate->getInfoCate($_GET['category']);

            } else {
                $collectionPro = $product->filterProduct();
            }
            if (isset($infoCate))
                $viewTitle = $infoCate['nameCate'];


            include_once 'view/inc/header.php';
            include_once 'view/collection.php';
            include_once 'view/inc/footer.php';
            break;
        case 'detail':
            $product = new Product();
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $infoPro = $product->filterProduct("detail", $_GET['id']);
                if (isset($infoPro) && $infoPro->status == true) {
                    $productInfo = $infoPro->result;
                    $viewTitle = $productInfo[0]['namePro'];
                }
            } else {
                header("Location: ?page=404");
            }
            $newPro = $product->filterProduct("", "", 8);
            include_once 'view/inc/header.php';
            include_once 'view/detail.php';
            include_once 'view/inc/footer.php';
            break;
        case 'cart':
            $cartResult = $classCart->getCartUser();
            
            include_once 'view/inc/header.php';
            include_once 'view/cart.php';
            include_once 'view/inc/footer.php';
            break;
        case 'checkout':
            include_once 'view/inc/header.php';
            include_once 'view/checkout.php';
            include_once 'view/inc/footer.php';
            break;
        default:
            header("Location: ?page=404");
    }
}
?>