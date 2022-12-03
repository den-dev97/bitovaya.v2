<?php
    require_once('../../functions.php');

    $products = getProducts();
    echo json_encode($products);
    exit();
