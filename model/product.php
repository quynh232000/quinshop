<?php
include_once "lib/database.php";
include_once "helpers/format.php";
include_once "helpers/tool.php";
include_once "model/entity.php";
?>
<?php
class Product
{
    private $db;
    private $fm;
    private $tool;
    private $response;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
        $this->tool = new Tool();
    }
    public function updateProduct(
        $name,
        $description,
        $categoryId,
        $quantity,
        $origin,
        $brand,
        $price,
        $salePercent,
        $image,
        $listImage,
        $unit
    ) {
        $slug = $this->tool->slug($name, '-');
        $fileResult = $this->tool->uploadFile($image);
        $query = "INSERT INTO product (product.namePro, product.description, product.categoryId,product.status,
            product.quantity,product.brand,product.image,origin,price,
            salePercent,slug,unit,createdAt,sold) VALUES
                (
                    '$name',
                    '$description',
                    '$categoryId',
                    'active',
                    '$quantity',
                    '$brand',
                    '$fileResult',
                    '$origin',
                    '$price',
                    '$salePercent',
                    '$slug',
                    '$unit',
                    NOW(),
                    0
                )
            ";
        $result = $this->db->insert($query);
        if ($result == false) {
            $alert = "Create new product error! Wrong from server!";
            return $alert;

        }
        // get id product
        $getIdPro = $this->db->select("SELECT LAST_INSERT_ID();");
        $idPro = mysqli_fetch_assoc($getIdPro)['LAST_INSERT_ID()'];
        // list img
        $totalFile = count($listImage['name']);
        $querylistImg = "";
        for ($i = 0; $i < $totalFile; $i++) {
            $fileDir = "./assest/upload/";
            if (isset($listImage['error'][$i]) && $listImage['error'][$i] == 0) {
                $fileName = basename($listImage['name'][$i]);
                if (!file_exists($fileDir)) {
                    mkdir($fileDir, 0, true);
                }
                $fileNameNew = $this->tool->GUID() . "." . (explode(".", $fileName)[1]);
                $fileDir = $fileDir . $fileNameNew;
                if (move_uploaded_file($listImage['tmp_name'][$i], $fileDir)) {
                    $querylistImg .= "('$idPro', '$fileNameNew',NOW()),";
                }
            }
        }
        $querylistImg = rtrim($querylistImg, ",");
        $queryImg = "INSERT into listimage (productId,imagePro,createdAt) values
                $querylistImg ";
        $resulltListImage = $this->db->insert($queryImg);
        if ($resulltListImage == false) {
            return false;
        } else {
            return true;
        }
        // return "Create new product successfully!";
    }
    public function getAllProduct($page =1, $limit = 10)
    {
        $getTotal = $this->db->select("SELECT COUNT(*) AS total from product");
        $total =$getTotal->fetch_assoc();
        $total = $total ==false ? 0 : $total['total']; 
        if($page <1){
            $page = 1;
        }

        $currentPage = ($page -1)* $limit;

        $query = "SELECT pr.*, cate.nameCate as nameCategory from product as pr 
            INNER JOIN category as cate on pr.categoryId = cate.id 
            ORDER BY pr.createdAt DESC 
            limit $currentPage,$limit
        ";
        $result = $this->db->select($query);
        if ($result != false) {
            $rows = [];
            while ($row = mysqli_fetch_array($result)) {
                $rows[] = $row;
            }
            return new Response(true, "success", $rows, "",$total);;

        } else {

            return "something wrong from server!";
        }
    }
    public function filterProduct($key = "", $value="", $limit = 20)
    {
        if ($limit == "all") {
            $limit = "0,18446744073709551615";
        }
        $query = "";
        switch ($key) {
            case 'random':
                $query = "SELECT pr.id, pr.brand, pr.namePro ,pr.categoryId, pr.quantity , pr.image, pr.origin, pr.price, pr.salePercent, pr.slug,
                 cate.nameCate as nameCategory from product as pr INNER JOIN category as cate on pr.categoryId = cate.id  ORDER BY RAND() LIMIT $limit";
                break;
            case 'detail':
                $query = "SELECT pr.*,
                 cate.nameCate as nameCategory from product as pr INNER JOIN category as cate on pr.categoryId = cate.id  WHERE pr.id = $value";

                break;
            case 'category':
                $query = "SELECT pr.id, pr.brand, pr.namePro ,pr.categoryId, pr.quantity, pr.image, pr.origin, pr.price, pr.salePercent, pr.slug,
                 cate.nameCate as nameCategory from product as pr INNER JOIN category as cate on pr.categoryId = cate.id  WHERE pr.categoryId = $value LIMIT $limit";
                break;

            default:
                $query = "SELECT pr.id, pr.brand, pr.namePro ,pr.categoryId, pr.quantity, pr.image, pr.origin, pr.price, pr.salePercent, pr.slug,
                 cate.nameCate as nameCategory from product as pr INNER JOIN category as cate on pr.categoryId = cate.id  ORDER BY pr.createdAt LIMIT $limit";
                break;
        }
        // ================================
        $response = $this->db->select($query);
        if ($response == false) {

            return new Response(false, "Error", "", "");
        } else {
            $result = [];
            if ($key == "detail") {
                // mysqli_fetch_assoc
                while ($row = mysqli_fetch_assoc($response)) {
                    $result[] = $row;
                }
                $listImg = $this->db->select("SELECT imagePro as link FROM listimage WHERE productId = $value ");
                if ($listImg != false) {
                    $arrayimg =[];
                    while ($rowimg = mysqli_fetch_array($listImg)) {
                        $arrayimg[] = $rowimg;
                    }
                    array_push($result,$arrayimg);
                }
            } else {
                while ($row = mysqli_fetch_array($response)) {
                    $result[] = $row;
                }
               
            }
            return new Response(true, "Successcully", $result, "");
        }
    }
    public function deleteProduct($id)

    {
        $isLogin = Session::get("isLogin");
        if ($isLogin != true) {
            return new Response(true, "success", ["total" => 0, "totalPrice" => 0], "");
        }
        $role = Session::get("role");
        if ($role != "adminall") {
            return new Response(false, "Bạn không có quyền cho hành động này!", "", "");
        }
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
    public function seachProduct($value =""){
        
        $resultSql = $this->db->select("SELECT p.id, p.namePro, p.brand,p.image FROM product AS p 
                WHERE p.namePro 
                LIKE '%$value%'
                ORDER BY p.createdAt
                LIMIT 10
        ");
        if($resultSql ==false){
            return new Response(false,"Fail",[],"");
        }
        $result =[];
         while ($row = mysqli_fetch_array($resultSql)) {
            $result[] = $row;
        }
        
        return new Response(true, "Successcully", $result, "");
        
    }


}

?>