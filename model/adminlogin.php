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
                    // return Session::get('fullName');
                } else{
                    $alert = "Tên đăng nhập hoặc tài khoản không đúng!";
                    return ["status"=>false,"message"=> $alert,"result"=>[],"redirect"=>""];
                }
            }
        }
        public function registerlogin_admin($userName,$fullName,$email,$phone,$password,$confirmPassword){
            $userName = $this->fm->validation($userName);
            $fullName = $this->fm->validation($fullName);
            $email = $this->fm->validation($email);
            $phone = $this->fm->validation($phone);
            $password = $this->fm->validation($password);
            $confirmPassword = $this->fm->validation($confirmPassword);

            $userName = mysqli_real_escape_string($this->db->link, $userName);
            $fullName = mysqli_real_escape_string($this->db->link, $fullName);
            $email = mysqli_real_escape_string($this->db->link, $email);
            $phone = mysqli_real_escape_string($this->db->link, $phone);
            $password = mysqli_real_escape_string($this->db->link, $password);
            $confirmPassword = mysqli_real_escape_string($this->db->link, $confirmPassword);

            if(empty($userName) ){
                $alert = "UserName must no be empty!";
                return ["status"=>false,"message"=> $alert,"result"=>[]];
            }
            if(empty($email) ){
                $alert = "UserName must no be empty!";
                return ["status"=>false,"message"=> $alert,"result"=>[]];

            }
            if(empty($password )||empty( $confirmPassword) ){
                $alert = "UserName must no be empty!";
                return ["status"=>false,"message"=> $alert,"result"=>[]];

            }
            if($password != $confirmPassword ){
                $alert = "Password and passwordconfirm doesn't match!";
                return ["status"=>false,"message"=> $alert,"result"=>[]];

            }
            $avatar = 'https://static.vecteezy.com/system/resources/previews/012/941/847/original/illustration-of-avatar-girl-nice-smiling-woman-with-black-hair-flat-icon-on-purple-background-vector.jpg';
            $id = $this->tool->GUID();
            $query = "INSERT INTO user (id,userName,fullName,email,phone,pass,avatar) VALUES
               ( '$id',
                '$userName',
                 '$fullName',
                '$email',
                '$phone',
                '$password',
                '$avatar')
            ";
            $result = $this->db->select($query);
            if($result != true){
                
                // header("Location: ?mod=profile&act=login");
                return ["status"=>true,"message"=> "","result"=>[],"redirect"=>"?mod=profile&act=login"];

                // return Session::get('fullName');
            } else{
                $alert = "Something wrong from server!";
                return ["status"=>false,"message"=> $alert,"result"=>[]];
                
            }
        }
    }

?>