<?php
    require_once('./functions.php');

    $news = sql("SELECT * FROM news") -> fetchAll();

    //head(title), header, main(categories,products), footer
    $stylesheets = getHTMLStyleSheets(['all', 'bulma', 'main']);
    $scripts = getHTMLScripts(['jq', 'main']);
    $head = template('head', ['title' => 'Магазин', 'stylesheets' => $stylesheets]);
    $header = template('header');
    $main = template('news', compact('news'));
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