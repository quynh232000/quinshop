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
        $listimage,
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
        if ($result != false) {
            return "Create new product successfully!";
        } else {
            $alert = "Create new product error! Wrong from server!";
            return $alert;
        }
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

        }else{

            return "something wrong from server!";
        }
    }
    public function deleteProduct($id){
        if(empty($id)){
            return "Id product cannot be empty";
        }
        $query = "DELETE FROM product WHERE id='$id'";
        $result = $this->db->delete($query);
        if($result !=false){
            return true;
        }else{
            return "Your product doesn't exist!";
        }
    }



}

?>