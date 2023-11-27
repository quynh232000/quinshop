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
    public function getAllOrder($type ="")
    {
        $isLogin = Session::get("isLogin");
        if ($isLogin != true) {
            return new Response(false, "false", "", "");
        }
        $userId = Session::get("id");
        
        $oders = $this->db->select("SELECT de.*, i.status,i.total,i.subTotal ,i.id as 'sku', p.namePro,p.image,p.price
            FROM invoicedetail as de
            INNER JOIN invoice as i
            ON de.invoinceId = i.id
            INNER JOIN product as p
            ON de.productId = p.id
            WHERE i.userId = '$userId'
        ");
        if ($oders == false) {
            return new Response(false, "false", "", "");
        } 
        $result = [];
        while ($row = mysqli_fetch_assoc($oders)) {
            $result[] = $row;
        }
        return new Response(true, "success", $result, "");
    }
    public function getAllInvoince()
    {
        $isLogin = Session::get("isLogin");
        if ($isLogin != true) {
            return new Response(false, "false", "", "");
        }
        $invoice = $this->db->select("SELECT i.*,ad.nameReceiver, ad.phone
            FROM invoice AS i
            INNER JOIN quin.address as ad
            ON i.addressId = ad.id
            ORDER BY i.createdAt
        ");
        if ($invoice == false) {
            return new Response(false, "false", "", "");
        } 
        $result = [];
        while ($row = mysqli_fetch_assoc($invoice)) {
            $result[] = $row;
        }
        return new Response(true, "success", $result, "");
    }
    
    
}



?>