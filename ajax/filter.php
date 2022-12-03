<?php

    require_once('../functions.php');
    $q = "SELECT * FROM products";
    if(!empty($_POST)){
        $q .= " WHERE 1";
        if(isset($_POST['stock'])){
            $q .= " AND {$_POST['stock']}='1'";
        }
        if(isset($_POST['gender'])){
            $q .= " AND gender='{$_POST['gender']}'";
        }
        if(isset($_POST['price'])){
            if($_POST['price'] === 'up'){
                $order = 'ASC';
            }else{
                $order = 'DESC';
            }
            $q .= " ORDER BY price $order";
        }
    }
    $productsItems = sql($q) -> fetchAll();
    $products = template('products', ['products' => $productsItems], '../templates/');
    echo $products;