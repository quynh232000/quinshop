<?php
// session_start();
include_once "lib/session.php";
include_once "model/cart.php";

extract($_REQUEST);
if (isset($act)) {
    switch ($act) {
        case 'cart':
            $classCart = new Cart();
            if (isset($_GET['type']) && isset($_GET['idpro']) && !empty($_GET['type']) && !empty($_GET['idpro'])) {
                $type = $_GET['type'];
                $idPro = $_GET['idpro'];
                $resultUpdateCart = $classCart->updateCart($type,$idPro);
                $json = json_encode($resultUpdateCart, JSON_PRETTY_PRINT);
                echo $json;
                return ;
            }
            break;
        default:
            break;
           
    }
}

?>