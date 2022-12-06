<?php
    require_once('./functions.php');

    if(empty($_COOKIE)){
        initCookie();
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_POST['customer_id'] = $_SESSION['customer']['id'];
        if(sqlInsert('estimates', $_POST)){
            echo '
            <div class="is-flex is-justify-content-center is-align-items-center checkout-button">
                Спасибо за вашу оценку
            </div>
            ';
            header('Refresh: 2; url=/');
        }else{
            die('Возникла ошибка');
        }
    }
?>