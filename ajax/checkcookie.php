<?php
    require_once('../functions.php');

    $tok = $_COOKIE['tok'];

    $content = json_decode(sql("SELECT content FROM cookies WHERE token='$tok'")->fetch()['content'], true);

    $cart = 0;

    if($content){
        foreach($content as $item){
            $cart += $item['count'];
        }
    }

    echo $cart;
