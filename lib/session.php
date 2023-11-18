
<?php
    class Session{
        public static function init(){
            // session_start();
            if(version_compare(phpversion(),'5.4.0','<')){
                if(session_id()==''){
                    session_start();
                }
            }else{
                if(session_status() == 'PHP_SESION_NONE'){
                    session_start();
                }
            }
        }
        public static function set($key, $val){
            $_SESSION[$key] = $val;
        } 
        public static function get($key){
            if(isset($_SESSION[$key])){
                return $_SESSION[$key];
            }else{
                return false;
            }
        }
        public static function checkPermission($role){
            self::checkSession();
            if(self::get("role") != $role){
                header("Location:/web-demo_php/login.php");
            }

        }
        public static function checkSession(){
            self::init();
            if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']==true){
                if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
                    session_unset(); 
                    session_destroy();
                    header("Location:/web-demo_php/login.php");
                }
                $_SESSION['LAST_ACTIVITY'] = time();

            }else{
                header("Location:/web-demo_php/login.php");
            }
        }
        public static function checkLogin(){
            self::init();
            if((self::get("isLogin"))==true){
                header("Location:/web-demo_php/index.php");
            }
        }
        public static function destroy(){
            self::init();
            
            session_destroy();
            return  "<script>location.href = '/web-demo_php/login.php';</script>";
            // self::checkLogin();
            // header("Location:/web-demo_php/login.php");
            // exit(header("Location:/web-demo_php/login.php"));
            
        }
        
    }

?>