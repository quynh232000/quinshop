<?php
// session_start();
include_once "./lib/session.php";
// session_start();
Session::checkSession();
Session::checkPermission("admin");
include_once 'model/category.php';
include_once 'model/product.php';
include_once 'model/user.php';
include_once 'model/order.php';

extract($_REQUEST);
if (isset($act)) {
    switch ($act) {
        case 'dashboard':
            $viewTitle = 'Dashboard';
            include_once 'view/inc/headerAdmin.php';
            include_once 'view/inc/sidebarAdmin.php';
            include_once 'view/admin/dashboard.php';
            include_once 'view/inc/footer.php';
            break;
        case 'addproduct':

            $viewTitle = 'Create new product';
            $classPro = new Product();
            $cate = new Category();
            $allCategory = $cate->getAllCate();
            if (isset($_POST['btn-create-product']) && $_POST['btn-create-product']) {
                $resAddPro = $classPro->updateProduct(
                    $_POST['name'],
                    $_POST["description"],
                    $_POST["categoryId"],
                    $_POST["quantity"],
                    $_POST["origin"],
                    $_POST["brand"],
                    $_POST["price"],
                    $_POST["salePercent"],
                    $_FILES["image"],
                    $_FILES["listImage"],
                    $_POST["unit"]
                );
            }
            include_once 'view/inc/headerAdmin.php';
            if (isset($resAddPro)) {
                echo '<div id="toast" mes-type="success" mes-title="Thành công!" mes-text="Đăng sản phẩm thành công."></div>';
               
            }
            include_once 'view/inc/sidebarAdmin.php';
            include_once 'view/admin/addproduct.php';
            include_once 'view/inc/footer.php';
            break;
        case 'manageproduct':
            $viewTitle = 'Manage your products';
            $classPro = new Product();
            $allProduct = $classPro->getAllProduct();
            $cate = new Category();
            $allCategory = $cate->getAllCate();
            // ddelete product
            if ((isset($_GET['type']) && isset($_GET['idPro'])) && ($_GET['type']) && $_GET['idPro']) {
                $type = $_GET['type'];
                $idPro = $_GET['idPro'];
                if ($type == "delete") {
                   $resultDeletePro =  $classPro->deleteProduct($idPro);
                }
            }
            include_once 'view/inc/headerAdmin.php';
            if(isset($resultDeletePro)) {
                if($resultDeletePro->status == true){
                    echo '<div id="toast" mes-type="success" mes-title="Thành công!" mes-text="'.$resultDeletePro->message.'"></div>';
                }else{
                    echo '<div id="toast" mes-type="error" mes-title="Thất bại!" mes-text="'.$resultDeletePro->message.'"></div>';

                }
                // echo ' <script>
                //     setTimeout(function() {
                //         window.location.href="'.$resultDeletePro->redirect.'";
                //     }, 4000);
                // </script>';
            }
            include_once 'view/inc/sidebarAdmin.php';
            include_once 'view/admin/manageproduct.php';
            include_once 'view/inc/footer.php';
            break;
        case 'managecategory':
            $viewTitle = 'Manage category';
            $cate = new Category();

            if (isset($_POST['create-cate-btn']) && $_POST['create-cate-btn']) {
                $createCate = $cate->createNewCate($_POST['name'], $_FILES['image']);
            }
            if ((isset($_GET['type']) && isset($_GET['idCate'])) && ($_GET['type']) && $_GET['idCate']) {
                $type = $_GET['type'];
                $idCate = $_GET['idCate'];
                if ($type == "delete") {
                   $resultDeleteCate =  $cate->deleteCate($idCate);
                }


            }
            if(isset($resultDeleteCate)) {
                if($resultDeleteCate->status == true){
                    echo '<div id="toast" mes-type="success" mes-title="Thành công!" mes-text="'.$resultDeleteCate->message.'"></div>';
                }else{
                    echo '<div id="toast" mes-type="error" mes-title="Thất bại!" mes-text="'.$resultDeleteCate->message.'"></div>';

                }
                // echo ' <script>
                //     setTimeout(function() {
                //         window.location.href="'.$resultDeletePro->redirect.'";
                //     }, 4000);
                // </script>';
            }
            $allCategory = $cate->getAllCate();
            include_once 'view/inc/headerAdmin.php';
            include_once 'view/inc/sidebarAdmin.php';
            include_once 'view/admin/managecategory.php';
            include_once 'view/inc/footer.php';
            break;
        case 'manageorders':

            $classOrder = new Order();
            $resultOrder = $classOrder->getAllInvoince();
            
           
            $viewTitle = 'Manage orders';
            include_once 'view/inc/headerAdmin.php';
            include_once 'view/inc/sidebarAdmin.php';
            include_once 'view/admin/manageorders.php';
            include_once 'view/inc/footer.php';
            break;
        case 'manageuser':
            $classUser = new User();
            $allUser = $classUser->getAllUser();
            
            $viewTitle = 'Quản lý user';
            include_once 'view/inc/headerAdmin.php';
            include_once 'view/inc/sidebarAdmin.php';
            include_once 'view/admin/manageuser.php';
            include_once 'view/inc/footer.php';
            break;
        default:
            header('Location: ?page=404');
    }
}

?>