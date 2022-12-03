<?php
    require_once('./functions.php');

    if(empty($_COOKIE)){
        initCookie();
    }

    extract($_POST);


    $tok = $_COOKIE['tok'];

    $userId = sql("SELECT id FROM customers WHERE `email`='$email'")->fetch()['id'];

    if(!$userId){
        sqlInsert('customers', [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'cookie' => $tok
        ]);
        $userId = sql("SELECT id FROM customers WHERE `email`='$email'")->fetch()['id'];
    }

    sqlInsert('orders', [
        'customer' => $userId,
        'pay_method' => $pay_method,
        'amount' => $amount,
        'comment' => $comment
    ]);

    $orderId = sql("SELECT id FROM orders WHERE `customer`='$userId' AND `status`='new' ORDER BY id DESC  LIMIT 1")->fetch()['id'];

    $cartContent = json_decode(sql("SELECT content FROM cookies WHERE token='$tok'")->fetch()['content'], true);

    foreach($cartContent as $i => $item){
        sqlInsert('orders_customers', [
            'id_order' => $orderId,
            'id_customer' => $userId,
            'id_product' => $item['id'],
            'count' => $item['count']
        ]);
    }

    $q = "UPDATE cookies SET content='{}' WHERE token='$tok'";

    sql($q);

    header("Location:./cart.php?alert=true&order_num=$orderId");

?>