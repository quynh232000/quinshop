<?php
include_once "lib/database.php";
include_once "helpers/tool.php";
include_once "model/entity.php";
include_once "lib/session.php";
?>
<?php
class Cart
{
    private $db;
    private $tool;
    private $response;

    public function __construct()
    {
        $this->db = new Database();
        $this->tool = new Tool();
    }
    public function getCartUser(){
        $isLogin = Session::get("isLogin");
        if ($isLogin != true) {
            return new Response(false, "false","", "");
        }
        $userId = Session::get("id");
        $cartUser = $this->db->select("SELECT c.*,
        p.namePro, p.image, p.brand, p.price, p.quantity, p.origin
        from cart AS c INNER JOIN product AS p  ON c.productId = p.id WHERE c.userId = '$userId'");
        if ($cartUser == false) {
            return new Response(false, "false","", "");
        }else{
            $result = [];
            while ($row = mysqli_fetch_array($cartUser)) {
                $result[] =  $row;
            }
            return new Response(true, "success",$result, "");
        }
    }
    public function getCartView()
    {
        $isLogin = Session::get("isLogin");
        if ($isLogin != true) {
            return new Response(true, "success", ["total" => 0, "totalPrice" => 0], "");
        }
        $userId = Session::get("id");
        $checkCart = $this->db->select("SELECT * FROM cart WHERE userId = '$userId'");
        if ($checkCart == false) {
            return new Response(true, "success", ["total" => 0, "totalPrice" => 0], "");
        }
        $query = "select SUM(c.count * p.price) as totalPrice, SUM(c.count) as total from cart as c inner join product as p on c.productId = p.id where userId = '$userId';";
        $resultGetCart = $this->db->select($query);
        if ($resultGetCart == false) {
            return new Response(true, "success", ["total" => 0, "totalPrice" => 0], "");
        } else {

            $result = $resultGetCart->fetch_assoc();

            return new Response(true, "success", $result, "");
        }
    }
    public function updateCart($key = "", $value = "")
    {
        $isLogin = Session::get("isLogin");
        if ($isLogin == false) {
            return new Response(false, "Vui lòng đăng nhập!", "", "");
        }
        $userId = Session::get("id");
        $checkCart = $this->db->select("SELECT * from cart  as c WHERE c.userId = '$userId' AND c.productId = '$value'");
        // return new Response(true, "Đã thêm sản phẩm vào giỏ hàng thành công!", "", "");
        switch ($key) {
            case 'minus':
                if ($checkCart == false) {
                    return new Response(false, "Thêm sản phẩm thất bại!", "", "");
                } else {
                    $updateCart = $this->db->update("UPDATE cart set count = count -1 where userId = $userId AND productId = $value");
                    if ($updateCart == false) {
                        return new Response(false, "Cập nhật giỏ hàng thất bại thất bại!", "", "");
                    } else {
                        return new Response(true, "Cập nhật giỏ hàng thành công!", "", "");
                    }
                }

            case 'delete':
                if ($checkCart == false) {
                    return new Response(false, "Xóa sản phẩm thất bại!", "", "");
                } else {
                    $updateCart = $this->db->delete("DELETE cart where userId = $userId AND productId = $value");
                    if ($updateCart == false) {
                        return new Response(false, "Cập nhật giỏ hàng thất bại thất bại!", "", "");
                    } else {
                        return new Response(true, "Cập nhật giỏ hàng thành công!", "", "");
                    }
                }

            default:
            if ($checkCart == false) {
                    $createCart = $this->db->insert("INSERT INTO cart (userId,productId) VALUE ('$userId', '$value')");
                    if ($createCart == false) {
                        return new Response(false, "Thêm sản phẩm thất bại!", "", "");
                    } else {
                        return new Response(true, "Đã thêm sản phẩm vào giỏ hàng thành công!", "", "");
                    }
                } else {
                    $updateCart = $this->db->update("UPDATE cart set count = count +1 where userId = '$userId' AND productId = '$value'");
                    if ($updateCart == false) {
                        return new Response(false, "Thêm sản phẩm thất bại!", "", "");
                    } else {
                        return new Response(true, "Đã thêm sản phẩm vào giỏ hàng thành công!", "", "");
                    }
                }
                
        }

    }
    public function deleteProduct($id)
    {
        if (empty($id)) {
            // return "Id product cannot be empty";
            return new Response(false, "Hành động không hợp lệ! Vui lòng thử lại!", "", "?mod=admin&act=manageproduct");
        }
        $query = "DELETE FROM product WHERE id='$id'";
        $result = $this->db->delete($query);
        if ($result != false) {
            return new Response(true, "Xóa sản phẩm thành công", "", "?mod=admin&act=manageproduct");
        } else {
            return new Response(false, "Hành động không hợp lệ! Vui lòng thử lại!", "", "?mod=admin&act=manageproduct");
        }
    }



}



?>