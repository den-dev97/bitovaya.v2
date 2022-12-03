<?php
    require_once('./functions.php');//Подключаем файл с функциями

    if(empty($_COOKIE)){//Если файл cookie не установлен, то устанавливаем
        initCookie();
    }

    $productsItems = getProducts();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $search = $_POST['search'];
        $q = "SELECT * FROM products WHERE `title` LIKE '%$search%'";
        $productsItems = sql($q) -> fetchAll();
    }
    $stylesheets = getHTMLStyleSheets(['all', 'bulma', 'main']);
    $scripts = getHTMLScripts(['jq', 'main', 'index', 'filter']);

    $head = template('head', ['title' => 'Бытовая техника', 'stylesheets' => $stylesheets]);
    $header = template('header');
    $categories = template('categories');

    $products = template('products', ['products' => $productsItems]);
    $main = template('main', ['categories' => $categories, 'products' => $products]);
    $footer = template('footer');

    $html = template('layout', [ // с помощью функции template собираем страницу по частям
        'head' => $head,
        'header' => $header,
        'main' => $main,
        'footer' => $footer,
        'scripts' => $scripts
    ]);

    echo $html; //Выводим страницу в браузер
?>