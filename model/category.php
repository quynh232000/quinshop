<?php
include_once "lib/database.php";
include_once "helpers/format.php";
include_once "helpers/tool.php";
include_once "model/entity.php";
?>
<?php
class Category
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
    public function createNewCate($name, $file)
    {
        $name = $this->fm->validation($name);
        $name = mysqli_real_escape_string($this->db->link, $name);
        if (empty($name)) {
            $alert = "Name and file image must no be empty!";
            return $alert;
        } else {
            $slug = $this->tool->slug($name, '-');
            $fileResult = $this->tool->uploadFile($file);
            if ($fileResult == false) {
                return 'Something arong from your file!';
            }
            $query = "INSERT INTO category (nameCate, slug, imageCate) VALUES
                    (
                        '$name',
                        '$slug',
                        '$fileResult'
                    )
                ";
            $result = $this->db->insert($query);
            if ($result != false) {
                return "Create new category successfully!";
            } else {
                $alert = "Wrong from server!";
                return $alert;
            }
        }
    }
    public function getAllCate()
    {
        $query = "SELECT * from category";
        $result = $this->db->select($query);
        return $result;
    }
    public function deleteCate($id)
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
            return "Idcategory cannot be empty";
        }
        $query = "DELETE FROM category WHERE id = '$id'";
        $result = $this->db->delete($query);
        if ($result != false) {
            return new Response(true, "Xóa danh mục thành công!", "", "");
        } else {
            return new Response(false, "Xóa danh mục thất bại!", "", "");
        }
    }
    public function getInfoCate($id)
    {
        if (!empty($id)) {
            $query = "SELECT * from category WHERE id = $id";
            $result = $this->db->select($query);
            if ($result != false) {
                return mysqli_fetch_assoc($result);

            }
        }
    }


}

?>