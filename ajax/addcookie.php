<?php
    require_once('../functions.php');

    $id = $_GET['id']??0;
    $tok = $_COOKIE['tok'];
    $exist = false;

    $content = json_decode(sql("SELECT content FROM cookies WHERE token='$tok'")->fetch()['content'], true);

    if($content){
        foreach($content as $i => &$item){
            if($id === $item['id']){
                $item['count'] += 1;
                $exist = true;
                break;
            }
        }
    }else{
        $content = [];
    }


    if(!$exist){
        array_push($content, 
            [
                'id' => $id,
                'count' => 1
            ]
        );
    }
    

    $cart = 0;

    foreach($content as $k => $v){
        $cart += $v['count'];
    }
   

    $json = json_encode($content);

    $q = "UPDATE cookies SET content='$json' WHERE token='$tok'";

    sql($q);

    echo $cart;
