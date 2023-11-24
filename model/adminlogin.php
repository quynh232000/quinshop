<?php 
    
    include_once "lib/session.php";
    // Session::checkLogin();
    include_once "lib/database.php";
    include_once "helpers/format.php";
    include_once "helpers/tool.php";
    // $tool = new Tool();
?>
<?php
    class Adminlogin{
        private $db;
        private $fm;
        private $tool;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
            $this->tool = new Tool();
        }
        public function login_admin($adminUser,$adminPass){
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);

            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

            if(empty($adminUser) || empty($adminPass)){
                $alert = "Vui lòng nhập đầy đủ thông tin!";
                return ["status"=>false,"message"=> $alert,"result"=>[],"redirect"=>""];
            }else{
                $query = "SELECT * FROM user WHERE userName ='$adminUser' AND pass = '$adminPass' LIMIT 1";
                $result = $this->db->select($query);
                if($result != false){
                    $value =$result->fetch_assoc();
                    Session::set('isLogin',true);
                    Session::set('id',$value['id']);
                    Session::set('userName',$value['userName']);
                    Session::set('fullName',$value['fullName']);
                    Session::set('email',$value['email']);
                    Session::set('avatar',$value['avatar']);
                    Session::set('phone',$value['phone']);
                    Session::set('role',$value['role']);
                    
                    // header("Location: ./");
                    return ["status"=>true,"message"=> "Đăng nhập thành công!","result"=>[],"redirect"=>"./"];
                } else{
                    $alert = "Tên đăng nhập hoặc tài khoản không đúng!";
                    return ["status"=>false,"message"=> $alert,"result"=>[],"redirect"=>""];
                }
            }
        }
        public function register_admin($userName,$fullName,$email,$phone,$password,$confirmPassword){
           

            if(empty($userName) ){
                $alert = "Tên đăng nhập không được để trống!";
                return ["status"=>false,"message"=> $alert,"result"=>[]];
            }
            if(empty($email) ){
                $alert = "Email không được để trống!";
                return ["status"=>false,"message"=> $alert,"result"=>[]];

            }
            if(empty($password )||empty( $confirmPassword) ){
                $alert = "Mật khẩu không được để trống!!";
                return ["status"=>false,"message"=> $alert,"result"=>[]];

            }
            if($password != $confirmPassword ){
                $alert = "Mật khẩu không khớp!";
                return ["status"=>false,"message"=> $alert,"result"=>[]];

            }

            $checkUser = $this->db->select("select * from user where userName = '$userName';");
            if($checkUser !=false){
                return ["status"=>false,"message"=> "Tên đăng nhập đã tồn tại!","result"=>[]];
            }
            $avatar = 'https://static.vecteezy.com/system/resources/previews/012/941/847/original/illustration-of-avatar-girl-nice-smiling-woman-with-black-hair-flat-icon-on-purple-background-vector.jpg';
            $id = $this->tool->GUID();
            $query = "INSERT INTO user (id,userName,fullName,email,phone,pass,avatar) VALUE
               ( '$id',
                '$userName',
                 '$fullName',
                '$email',
                '$phone',
                '$password',
                '$avatar')
            ";
             $this->db->insert($query);
            return ["status"=>true,"message"=> "Đăng kí thành công!","result"=>[],"redirect"=>"?mod=profile&act=login"];
           
        }
    }

?>