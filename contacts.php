<?php
    require_once('./functions.php');

    if(empty($_COOKIE)){
        initCookie();
    }

    //head(title), header, main(categories,products), footer
    $stylesheets = getHTMLStyleSheets(['all', 'bulma', 'main']);
    $scripts = getHTMLScripts(['jq', 'main', 'cart']);
    $head = template('head', ['title' => 'Контакты', 'stylesheets' => $stylesheets]);
    $header = template('header');
    $main = template('contacts', []);
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