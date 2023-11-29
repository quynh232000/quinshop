<?php

include_once "lib/session.php";
// Session::checkLogin();
include_once "lib/database.php";
include_once "helpers/format.php";
include_once "helpers/tool.php";
include_once "model/entity.php";
?>
<?php
class Adminlogin
{
    private $db;
    private $fm;
    private $tool;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
        $this->tool = new Tool();
    }
    public function login_admin($adminUser, $adminPass)
    {
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);

        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

        if (empty($adminUser) || empty($adminPass)) {
            $alert = "Vui lòng nhập đầy đủ thông tin!";
            return ["status" => false, "message" => $alert, "result" => [], "redirect" => ""];
        } else {
            $query = "SELECT * FROM user WHERE userName ='$adminUser' AND pass = '$adminPass' LIMIT 1";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set('isLogin', true);
                Session::set('id', $value['id']);
                Session::set('userName', $value['userName']);
                Session::set('fullName', $value['fullName']);
                Session::set('email', $value['email']);
                Session::set('avatar', $value['avatar']);
                Session::set('phone', $value['phone']);
                Session::set('role', $value['role']);

                // header("Location: ./");
                return ["status" => true, "message" => "Đăng nhập thành công!", "result" => [], "redirect" => "./"];
            } else {
                $alert = "Tên đăng nhập hoặc tài khoản không đúng!";
                return ["status" => false, "message" => $alert, "result" => [], "redirect" => ""];
            }
        }
    }
    public function register_admin($userName,$fullName, $email, $phone, $password, $confirmPassword)
    {


        if (empty($userName)) {
            $alert = "Tên đăng nhập không được để trống!";
            return ["status" => false, "message" => $alert, "result" => []];
        }
        if (empty($email)) {
            $alert = "Email không được để trống!";
            return ["status" => false, "message" => $alert, "result" => []];

        }
        if (empty($password) || empty($confirmPassword)) {
            $alert = "Mật khẩu không được để trống!!";
            return ["status" => false, "message" => $alert, "result" => []];

        }
        if ($password != $confirmPassword) {
            $alert = "Mật khẩu không khớp!";
            return ["status" => false, "message" => $alert, "result" => []];

        }

        $checkUser = $this->db->select("select * from user where userName = '$userName';");
        if ($checkUser != false) {
            return ["status" => false, "message" => "Tên đăng nhập đã tồn tại!", "result" => []];
        }
        $avatar = '5EA63482-44B3-40C9-B3A8-1479DB08CCD4.jpg';
        $id = $this->tool->GUID();
        $query = "INSERT INTO user (id,userName,fullName,email,phone,pass,avatar) VALUE
               ( '$id',
                '$userName',
                 '$fullName',
                '$email',
                '$phone',
                '$password',
                '$avatar')
            ";
        $this->db->insert($query);
        return ["status" => true, "message" => "Đăng kí thành công!", "result" => [], "redirect" => "?mod=profile&act=login"];

    }
    public function updateProfile( $fullName, $image, $phone, $email)
    {
        $isLogin = Session::get("isLogin");
        if ($isLogin != true) {
            return new Response(false, "false", "", "?mod=profile&act=login");
        }
        $userId = Session::get("id");
        $checkUser = $this->db->select("SELECT * FROM user WHERE id = '$userId'");
        if ($checkUser == false) {
            return new Response(false, "Thất bại!", "", "?mod=profile&act=login");
        }
        if (empty($fullName) || empty($email)) {
            return new Response(false, "Họ tên và Email không được để trống thông tin!", "", "");
        }
        // update user
        $queryUpdate ="";
        $fileResult = $this->tool->uploadFile($image);
        if ($fileResult) {
            $queryUpdate .= "u.avatar = '$fileResult',";
        }
        $queryUpdate .= "u.fullName = '$fullName',";
        $queryUpdate .= "u.phone = '$phone',";
        $queryUpdate .= "u.email = '$email',";
        $queryUpdate .= "u.updatedAt = NOW()";
        $updateUser = $this->db->update("UPDATE user u
            SET $queryUpdate
            WHERE u.id = '$userId'
        ");
        if($updateUser ==false){
            return new Response(false, "Cập nhật thông tin tài khoản thất bại", "", "","");
        }
        Session::set('fullName',$fullName);
        Session::set('email', $email);
        if ($fileResult) {
            Session::set('avatar', $fileResult );
        }
        Session::set('phone',$phone);
        return new Response(true, "Cập nhật thông tin thành công", "", "","");

    }
}

?>