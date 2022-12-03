<?php
require_once('./functions.php');

if(empty($_COOKIE)){
    initCookie();
}

$tok = $_COOKIE['tok'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    extract($_POST);
    $q = "SELECT id FROM customers WHERE `email`='$email' AND `registration`='0'";
    $userId = sql($q)->fetch()['id'];
    if((bool)$userId){
        sql("UPDATE customers SET `name`='$name', `password`='$password', `registration`='1' WHERE `id`='$userId'");
    }else{
        $_POST['cookie']  = $tok;
        $_POST['registration'] = '1';
        sqlInsert('customers', $_POST);
    }
    header('Location: ./login.php');
    exit();
}

$stylesheets = getHTMLStyleSheets(['all', 'bulma', 'main']);
$scripts = getHTMLScripts(['jq', 'main']);
$head = template('head', ['title' => 'Регистрация', 'stylesheets' => $stylesheets]);
$header = template('header');
$main = template('signup', []);
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