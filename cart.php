<?php
    require_once('./functions.php');

    if(empty($_COOKIE)){
        initCookie();
    }

    $tok = $_COOKIE['tok'];

    $cartContent = json_decode(sql("SELECT content FROM cookies WHERE token='$tok'")->fetch()['content'], true);

    foreach($cartContent as $i => &$item){
        $item['product'] = sql("SELECT * FROM products WHERE id={$item['id']}")->fetch();
    }


    $stylesheets = getHTMLStyleSheets(['all', 'bulma', 'main']);
    $scripts = getHTMLScripts(['jq', 'main', 'cart']);
    $head = template('head', ['title' => 'Корзина', 'stylesheets' => $stylesheets]);
    $footer = template('footer');
    $header = template('header');

    if(!isset($_GET['alert'])){
            $name = $_SESSION['customer']['name']??'';
            $email = $_SESSION['customer']['email']??'';
            $phone = $_SESSION['customer']['phone']??'';
            $main = template('cart', [
                'products' => $cartContent,
                'name' => $name,
                'email' => $email,
                'phone' => $phone
        ]);
    }else{
        extract($_GET);
        $main = template('alert', ['order_num' => $order_num]);
    }



    $html = template('layout', [
        'head' => $head,
        'header' => $header,
        'main' => $main,
        'footer' => $footer,
        'scripts' => $scripts
    ]);

    echo $html;
?>
