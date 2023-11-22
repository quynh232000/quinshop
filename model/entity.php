<?php 
    
    class Response{
        public $status;
        public $message;
        public $result;
        public $redirect;
        function __construct($status,$message ="",$result ="",$redirect="") {
            $this->status = $status;
            $this->message = $message;
            $this->result = $result;
            $this->redirect = $redirect;
        }
    }
?>