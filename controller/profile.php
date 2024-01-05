<?php
// session_start();
include_once "lib/session.php";
include_once 'model/category.php';
include_once 'model/product.php';
include_once "model/category.php";
include_once "model/adminlogin.php";
include_once "model/cart.php";
include_once "model/order.php";
include_once "model/user.php";
$classCart = new Cart();
$classUser = new Adminlogin();
$getCartInfo = $classCart->getCartView();
$cartResult = $classCart->getCartUser();
extract($_REQUEST);
if (isset($act)) {
    switch ($act) {
        case 'profile':
            if (isset($_POST['username']) && $_POST['username']) {
                $updateUser = $classUser->updateProfile($_POST["fullName"], $_FILES['avatar'], $_POST["phone"], $_POST["email"]);
                if (isset($updateUser)) {
                    if ($updateUser->status) {

                        echo '<div id="toast" mes-type="success" mes-title="Thành công!" mes-text="' . $updateUser->message . '"></div>';
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
        case 'sendemail':


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
            $active = 'default';
            if (isset($_POST['email']) && $_POST['email'] != "") {

                $email = $_POST['email'];
               
                $checkemail = $classUser->sendCodePassEmail($email);
                if ($checkemail->status == false) {
                    echo '<div id="toast" mes-type="error" mes-title="Thất bại!" mes-text="' . $checkemail->message . '"></div>';
                } else {

                    header('location: ' . $checkemail->redirect);
                }
            }
            if (isset($_GET['verifytoken']) && $_GET['verifytoken']) {
                $token = $_GET['verifytoken'];
                $checkToken = $classUser->checkToken($token);
                if ($checkToken->status == false) {
                    echo '<div id="toast" mes-type="error" mes-title="Thất bại!" mes-text="' . $checkToken->message . '"></div>';
                    $active = 'tokenerror';
                } else {
                    $active = 'submitcode';

                }
            }
            // submit code
            if (isset($_POST['code']) && count($_POST['code']) == 4) {
                $codes = $_POST['code'];
                $code = implode("", $codes);
                if (strlen($code) != 4) {
                    echo '<div id="toast" mes-type="error" mes-title="Thất bại!" mes-text="Vui lòng nhập mã CODE gồm 4 kí tự!"></div>';
                } else {
                    $token = $_GET['verifytoken'];
                    $checkCode = $classUser->checkCode($code, $token);

                    if ($checkCode->status == false) {

                        echo '<div id="toast" mes-type="error" mes-title="Thất bại!" mes-text="' . $checkCode->message . '"></div>';
                    } else {
                        $active = 'changepassword';
                    }
                }
            }
            // submit password
            if (isset($_POST['password']) && $_POST['password']) {
                $active = 'changepassword';
                $pass = $_POST['password'];
                $passConfirm = $_POST['passwordconfirm'];
                if ($passConfirm == "") {
                    echo '<div id="toast" mes-type="error" mes-title="Thất bại!" mes-text="Vui lòng nhập đầy đủ thông tin!"></div>';
                } elseif ($pass != $passConfirm) {
                    echo '<div id="toast" mes-type="error" mes-title="Thất bại!" mes-text="Mật khẩu không khớp. Vui lòng nhập lại"></div>';
                } else {
                    $token = $_GET['verifytoken'];
                    $changePass = $classUser->changePassword(md5($pass), $token);
                    if ($changePass->status == false) {
                        echo '<div id="toast" mes-type="error" mes-title="Thất bại!" mes-text="' . $changePass->message . '"></div>';

                    } else {
                        echo '<div id="toast" mes-type="success" mes-title="Thành công!" mes-text="Thay đổi mật khẩu thành công!"></div>';

                        echo ' <script>
                            setTimeout(function() {
                                window.location.href="?mod=profile&act=login";
                            }, 2500);
                        </script>';
                    }

                }

            }



            include_once 'view/forgotpassword.php';
            break;
        default:
            include_once 'view/inc/header.php';
            include_once 'view/error.php';
            include_once 'view/inc/footer.php';
    }
}

?>