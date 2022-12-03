<?php
    require_once('../functions.php');

    $id = $_GET['id'] ?? 0;
    $tok = $_COOKIE['tok'];

    $content = json_decode(sql("SELECT content FROM cookies WHERE token='$tok'")->fetch()['content'], true);

    foreach ($content as $i => $item) {
        if ($id === $item['id']) {
            unset($content[$i]);
            $exist = true;
            break;
        }
    }

    $cart = 0;

    foreach ($content as $k => $v) {
        $cart += $v['count'];
    }


    $json = json_encode($content);

    $q = "UPDATE cookies SET content='$json' WHERE token='$tok'";

    sql($q);

    echo $cart;
