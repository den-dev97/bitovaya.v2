<?php
    $id = $_GET['id']??0;
    require_once('../functions.php');
    $productsItems = getProducts($id);
    $products = template('products', ['products' => $productsItems], '../templates/');
    echo $products;