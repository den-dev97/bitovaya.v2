<?php
    require_once('./functions.php');

    if(empty($_COOKIE)){
        initCookie();
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_POST['customer_id'] = $_SESSION['customer']['id'];
        if(sqlInsert('estimates', $_POST)){
            echo 'Спасибо за вашу оценку';
            header('Refresh: 2; url=/');
        }else{
            die('Возникла ошибка');
        }
    }
?>