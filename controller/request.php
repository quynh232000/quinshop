<?php
// session_start();
include_once "lib/session.php";
include_once "model/cart.php";
include_once "model/product.php";

extract($_REQUEST);
if (isset($act)) {
    switch ($act) {
        case 'cart':
            $classCart = new Cart();
            if (isset($_GET['type']) && isset($_GET['idpro']) && !empty($_GET['type']) && !empty($_GET['idpro'])) {
                $type = $_GET['type'];
                $idPro = $_GET['idpro'];
                $count = isset($_GET['count'])?$_GET['count']:"";
                $resultUpdateCart = $classCart->updateCart($type,$idPro, $count);
                $json = json_encode($resultUpdateCart, JSON_PRETTY_PRINT);
                echo $json;
                return ;
            }
        case 'searchproduct':
            $classProduct = new Product();
            if (isset($_GET['keysearch']) ){
                $valueSearch =  $classProduct->seachProduct($_GET['keysearch']) ;
                echo json_encode($valueSearch, JSON_PRETTY_PRINT);
                return;
            }
            break;
        default:
            break;
           
    }
}

?>