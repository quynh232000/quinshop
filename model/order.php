<?php
include_once "lib/database.php";
include_once "helpers/tool.php";
include_once "model/entity.php";
include_once "lib/session.php";
?>
<?php
class Order
{
    private $db;
    private $tool;
    private $response;

    public function __construct()
    {
        $this->db = new Database();
        $this->tool = new Tool();
    }
    public function getOrder($type ="")
    {
        $isLogin = Session::get("isLogin");
        if ($isLogin != true) {
            return new Response(false, "false", "", "");
        }
        $userId = Session::get("id");
        
        $oders = $this->db->select("SELECT *
            FROM invoicedetail as de
            INNER JOIN invoice as i
            ON de.invoiceId = i.id
            WHERE i.userId = '$userId'
        ");
        if ($cartUser == false) {
            return new Response(false, "false", "", "");
        } else {
            $result = [];
            while ($row = mysqli_fetch_array($cartUser)) {
                $result[] = $row;
            }
            return new Response(true, "success", $result, "");
        }
    }
    
}



?>