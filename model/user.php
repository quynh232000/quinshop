<?php
include_once "lib/database.php";
include_once "helpers/tool.php";
include_once "model/entity.php";
include_once "lib/session.php";
?>
<?php
class User
{
    private $db;
    private $tool;
    private $response;

    public function __construct()
    {
        $this->db = new Database();
        $this->tool = new Tool();
    }
    public function getAllUser()
    {
        $isLogin = Session::get("isLogin");
        if ($isLogin != true) {
            return new Response(false, "false", "", "");
        }
        $userId = Session::get("id");

        $user = $this->db->select("SELECT * from user WHERE isDelete = '0'");
        if ($user == false) {
            return new Response(false, "false", "", "");
        }
        $result = [];
        while ($row = mysqli_fetch_assoc($user)) {
            $result[] = $row;
        }
        return new Response(true, "success", $result, "");

    }
    public function getUserById($id)
    {
        if ($id == "") {
            return new Response(false, "false", "", "");
        }
        $allRole = $this->db->select("SELECT u.role   FROM user as u group by u.role");
        $getAllRole =[];
        if ($allRole != false) {
            while ($row = mysqli_fetch_assoc($allRole)) {
                $getAllRole[] = $row;
            }

        }
        $user = $this->db->select("SELECT * FROM user Where id = '$id'");
        if ($user == false) {
            return new Response(false, "Tài khoản không tồn tại!", "", "");
        }
        $user = $user->fetch_assoc();
        return new Response(true, "success", $user, "", $getAllRole);

    }
    public function updateUser( $fullName, $image, $phone, $email,$role,$id)
    {
        $isLogin = Session::get("isLogin");
        if ($isLogin != true) {
            return new Response(false, "false", "", "?mod=profile&act=login");
        }
        $checkRoleAdmin = Session::get("role");
        if($checkRoleAdmin != "adminall"){
            return new Response(false, "Bạn không có quyền chỉnh sửa thông tin tài khoản!", "", "?mod=profile&act=login");
        }
        
        if (empty($fullName) || empty($email) || empty($id)) {
            return new Response(false, "Hành động có vấn đề!", "", "");
        }
        // update user
        $queryUpdate ="";
        $fileResult = $this->tool->uploadFile($image);
        if ($fileResult) {
            $queryUpdate .= "u.avatar = '$fileResult',";
        }
        $queryUpdate .= "u.fullName = '$fullName',";
        $queryUpdate .= "u.phone = '$phone',";
        if($role != ""){
        $queryUpdate .= "u.role = '$role',";

        }
        $queryUpdate .= "u.email = '$email',";
        $queryUpdate .= "u.updatedAt = NOW()";
        $updateUser = $this->db->update("UPDATE user u
            SET $queryUpdate
            WHERE u.id = '$id'
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
        header("Location: ?mod=admin&act=manageuser");
        return new Response(true, "Cập nhật thông tin thành công", "", "?mod=admin&act=manageuser","");

    }

}



?>