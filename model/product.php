<?php
include_once "lib/database.php";
include_once "helpers/format.php";
include_once "helpers/tool.php";



?>
<?php
class Product
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
            // header("Refresh:0");
            // return '<script>$alert("Tạo sản phẩm thành công!")</script>';
        }
        // return "Create new product successfully!";
    }
    public function getAllProduct()
    {
        $query = "SELECT pr.*, cate.nameCate as nameCategory from product as pr INNER JOIN category as cate where pr.categoryId = cate.id ";
        $result = $this->db->select($query);
        if ($result != false) {
            $rows = [];
            while ($row = mysqli_fetch_array($result)) {
                $rows[] = $row;
            }
            return $rows;

        } else {

            return "something wrong from server!";
        }
    }
    public function deleteProduct($id)
    {
        if (empty($id)) {
            return "Id product cannot be empty";
        }
        $query = "DELETE FROM product WHERE id='$id'";
        $result = $this->db->delete($query);
        if ($result != false) {
            return true;
        } else {
            return "Your product doesn't exist!";
        }
    }



}

?>