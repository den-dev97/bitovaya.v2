<?php
    require_once('./functions.php');

    if(empty($_COOKIE)){
        initCookie();
    }

    $stylesheets = getHTMLStyleSheets(['all', 'bulma', 'main']);
    $scripts = getHTMLScripts(['jq', 'main']);
    $head = template('head', ['title' => 'О нас', 'stylesheets' => $stylesheets]);

    $header = template('header');
    $main = template('about', []);
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