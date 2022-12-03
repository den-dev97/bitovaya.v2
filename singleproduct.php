<?php
    require_once('./functions.php');

    if(empty($_COOKIE)){
        initCookie();
    }

    $id = $_GET['id'] ?? 1;

    $q = "SELECT * FROM products WHERE `id`='$id'";

    $product = sql($q) -> fetch();

    $title = $product['title'];
    $stylesheets = getHTMLStyleSheets(['all', 'bulma', 'main']);
    $scripts = getHTMLScripts(['jq', 'main', 'index']);
    $head = template('head', ['title' => $title, 'stylesheets' => $stylesheets]);
    $header = template('header');
    $main = template('singleproduct', ['product' => $product]);
    $footer = template('footer');

    $html = template('layout', [
        'head' => $head,
        'header' => $header,
        'main' => $main,
        'footer' => $footer,
        'scripts' => $scripts
    ]);

    echo $html;
?>