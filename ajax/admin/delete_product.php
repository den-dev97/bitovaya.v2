<?php
    require_once('../../functions.php');
    if(delProduct($_POST['id'])){
        $products = getProducts();
        echo json_encode($products);
        exit();
    }
