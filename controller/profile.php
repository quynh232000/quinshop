<?php
// session_start();
include_once "lib/session.php";
include_once 'model/category.php';
include_once 'model/product.php';
include_once "model/category.php";
include_once "model/adminlogin.php";
extract($_REQUEST);
if (isset($act)) {
    switch ($act) {
        case 'profile':
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
                // $adminPass = ($_POST['adminPass']);
                $login_check = $class->login_admin($adminUser, $adminPass);
            }
            include_once 'view/login.php';
            break;
        case 'register':
            $class = new Adminlogin();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $checkRegister = $class->register_admin(
                    $_POST['username']
                    ,
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
        default:
            include_once 'view/inc/header.php';
            include_once 'view/error.php';
            include_once 'view/inc/footer.php';
    }
}

?>