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


}



?>