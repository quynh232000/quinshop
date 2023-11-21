<?php 
    include_once "lib/database.php";
    include_once "helpers/format.php";
    include_once "helpers/tool.php";
?>
<?php
    class Category{
        private $db;
        private $fm;
        private $tool;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
            $this->tool = new Tool();
        }
        public function createNewCate($name,$file){
            $name = $this->fm->validation($name);
            $name = mysqli_real_escape_string($this->db->link, $name);
            if(empty($name)){
                $alert = "Name and file image must no be empty!";
                return $alert;
            }else{
                $slug = $this->tool->slug($name,'-');
                $fileResult = $this->tool->uploadFile($file);
                if($fileResult ==false){
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
                if($result != false){
                    return "Create new category successfully!";
                } else{
                    $alert = "Wrong from server!";
                    return $alert;
                }
            }
        }
        public function getAllCate(){
            $query = "SELECT * from category";
            $result = $this->db->select($query);
            return $result;
        }
        public function deleteCate($id){
            if(empty($id)){
                return "Idcategory cannot be empty";
            }
            $query = "DELETE FROM category WHERE id='$id'";
            $result = $this->db->delete($query);
            if($result !=true){
                return "Your category doesn't exist!";
            }else{
                return $result;
            }
        }
        

    }

?>