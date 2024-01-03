<?php
include "./config/config.php";
?>
<?php
class Database
{
//     public $host   = DB_HOST;
//     public $user   = DB_USER;
//     public $pass   = DB_PASS;
//     public $dbname = DB_NAME;
    public $host = "localhost";
    public $user = "quin";
    public $pass = "Quin123@123.";
    public $dbname = "quin";

    public $link;
    public $error;

    public function __construct()
    {
        $this->connectDB();
    }

    // private function connectDB()
    // {
    //     $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    //     if ($this->link->connect_errno) {
    //         $this->error = "Connection database fail!" . $this->link->connect_error;
    //         return false;
    //     }
    // }

    // // select or read data
    // public function select($query)
    // {
    //     $result = $this->link->query($query) or die($this->link->error . __LINE__);
    //     if ($result && $result->num_rows > 0) {
    //         // && $result->num_rows > 0
    //         return $result;
    //     } else {
    //         return false;
    //     }

    // }
    // public function insert($query)
    // {
    //     $insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
    //     if ($insert_row) {
    //         return $insert_row;
    //     } else {
    //         return false;
    //     }
    // }
    // public function update($query)
    // {
    //     $update_row = $this->link->query($query) or die($this->link->error . __LINE__);
    //     if ($update_row) {
    //         return $update_row;
    //     } else {
    //         return false;
    //     }
    // }
    // public function delete($query)
    // {
    //     $delete_row = $this->link->query($query) or die($this->link->error . __LINE__);
    //     if ($delete_row) {
    //         return $delete_row;
    //     } else {
    //         return false;
    //     }
    // }
    // ----------------pddo ------------
    private function connectDB()
    {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $this->link = $conn;
          } catch(PDOException $e) {
            return false;
          }
    }

    // select or read data
    public function select($query)
    {
        $stmt = $this->link->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function insert($query)
    {
        return $this->link->exec($query);
    }
    public function update($query)
    {
        $stmt = $this->link->prepare($query);
         $stmt->execute();
         if($stmt->rowCount() >0){
            return true;
         }else{
            return false;
         }

        
    }
    public function delete($query)
    {
        return $this->link->exec($query);
    }
}

?>