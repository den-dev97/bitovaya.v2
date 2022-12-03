<?php
    require_once('./functions.php');

    if(empty($_COOKIE)){
        initCookie();
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){//Проверка того, что форма отправлена
        extract($_POST);
        $q = "SELECT * FROM customers WHERE `email`='$email' AND `password`='$password' AND `registration`='1'";
        $user = sql($q)->fetch();
        if($user){//Если в бд нашёлся зарегистрированный пользователь с данными параметрами "email" "password", то авторизуем его
            $_SESSION['customer'] = [//Открываем сессию и записываем в неё параметры пользователя
                'name' => $user['name'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'id' => $user['id']
            ];
            header('Location: ./index.php');//Перенаправление на главную страницу
            exit();
        }

    }

    $stylesheets = getHTMLStyleSheets(['all', 'bulma', 'main']);
    $scripts = getHTMLScripts(['jq', 'main']);
    $head = template('head', ['title' => 'Вход', 'stylesheets' => $stylesheets]);
    $header = template('header');
    $main = template('login', []);
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