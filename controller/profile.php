<?php
// session_start();
include_once "lib/session.php";
include_once 'model/category.php';
include_once 'model/product.php';
include_once "model/category.php";
include_once "model/adminlogin.php";
include_once "model/cart.php";
include_once "model/order.php";
$classCart = new Cart();
$classUser = new Adminlogin();
$getCartInfo = $classCart->getCartView();
$cartResult = $classCart->getCartUser();
extract($_REQUEST);
if (isset($act)) {
    switch ($act) {
        case 'profile':
            if(isset($_POST['username']) && $_POST['username']) {
                $updateUser = $classUser->updateProfile($_POST["fullName"],$_FILES['avatar'], $_POST["phone"], $_POST["email"]);
                if (isset($updateUser)) {
                    if ($updateUser->status) {
                        
                        echo '<div id="toast" mes-type="success" mes-title="Thành công!" mes-text="' . $updateUser->message. '"></div>';
                    } else {
                        echo '<div id="toast" mes-type="error" mes-title="Thành công!" mes-text="' . $updateUser->message . '"></div>';
                    }
                }
            }
            include_once 'view/inc/header.php';
            include_once 'view/inc/profilesidebar.php';
            include_once 'view/profile.php';
            include_once 'view/inc/footer.php';
            break;
        case 'login':
            // session_start();
            $class = new AdminLogin();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $adminUser = $_POST['adminUser'];
                $adminPass = md5($_POST['adminPass']);
                $login_check = $class->login_admin($adminUser, $adminPass);
            }
            include_once 'view/login.php';
            break;
        case 'register':
            $class = new Adminlogin();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $checkRegister = $class->register_admin(
                    $_POST['username'],
                    $_POST['fullname'],
                    $_POST['email'],
                    $_POST['phone'],
                    md5($_POST['password']),
                    md5($_POST['confirmpassword'])
                );

            }
            include_once 'view/register.php';
            break;
        case 'orderhistory':
            $classOrder = new Order();

            $allOrder = $classOrder->getAllOrder();
            
            include_once 'view/inc/header.php';
            include_once 'view/inc/profilesidebar.php';
            include_once 'view/orderhistory.php';
            include_once 'view/inc/footer.php';
            break;
        case 'sercurity':
            include_once 'view/inc/header.php';
            include_once 'view/inc/profilesidebar.php';
            include_once 'view/sercurity.php';
            include_once 'view/inc/footer.php';
            break;
        case 'forgotpassword':
            include_once 'view/forgotpassword.php';
            break;
        default:
            include_once 'view/inc/header.php';
            include_once 'view/error.php';
            include_once 'view/inc/footer.php';
    }
}

?>