<?php
    require_once('./functions.php');

    $is_admin = false;

    $orders = sql("SELECT *, o.id AS o_id FROM orders o JOIN customers c ON o.customer=c.id WHERE `status`='new' ORDER BY o.id ASC")->fetchAll();
    foreach($orders as $k => &$v){
        $o_id = $v['o_id'];
        $q = "SELECT * FROM orders_customers oc JOIN products p ON oc.id_product=p.id WHERE oc.id_order='$o_id'";
        $order_content = sql($q)->fetchAll();
        $v['order_content'] = $order_content;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){//Проверка того, что форма отправлена
        extract($_POST);
        $admin = sql("SELECT * FROM admins WHERE `login`='$login' AND `password`='$password'")->fetch();
        if($admin){//Если в бд нашёлся зарегистрированный пользователь с данными параметрами "email" "password", то авторизуем его
            $is_admin = true;
            $_SESSION['admin'] = true;
        }
    }

    //head(title), header, main(categories,products), footer
    $stylesheets = getHTMLStyleSheets(['all', 'bulma', 'bulma-checkradio', 'main']);
    $scripts = getHTMLScripts(
        ['jq', 'main', 'admin']
    );

    $head = template('head', ['title' => 'Администратор', 'stylesheets' => $stylesheets]);
    $header = template('header-admin');
    $main = template('login-admin', []);
    $footer = template('footer');


    if($is_admin || isset($_SESSION['admin'])){
        $header = template('header-admin');
        $main = template('main-admin', ['orders' => $orders]);
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