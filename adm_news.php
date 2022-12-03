<?php
    require_once('./functions.php');

    if(!isset($_SESSION['admin'])) die('Доступ запрещён');

    $alert = false;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){//Проверка того, что форма отправлена
        $img_name = $_FILES['img']['name'];
        $img_format = $_FILES['img']['type'];
        $dir = __DIR__ . '/assets/pic/news/';
        if(!file_exists($dir . $img_name) && move_uploaded_file($_FILES['img']['tmp_name'],  $dir . $img_name)){
            $_POST['img'] = $img_name;
            $_POST['mime'] = $img_format;
            sqlInsert('news', $_POST);
            $stamp = imagecreatefrompng($dir . 'wtm.png');
            $marge_right = 10;
            $marge_bottom = 10;
            $sx = imagesx($stamp);
            $sy = imagesy($stamp);

            if($img_format === 'image/png'){
                $im = imagecreatefrompng($dir . $img_name);
                imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
                unlink($dir . $img_name);
                imagepng($im, $dir . $img_name);
            }elseif($img_format === 'image/jpeg'){
                $im = imagecreatefromjpeg($dir . $img_name);
                imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
                unlink($dir . $img_name);
                imagejpeg($im, $dir . $img_name);

            }elseif($img_format === 'image/webp'){
                $im = imagecreatefromwebp($dir . $img_name);
                imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
                unlink($dir . $img_name);
                imagewebp($im, $dir . $img_name);
            }else{
                die('Неподдерживаемый формат');
            }
            $alert = true;
        }
    }

    $stylesheets = getHTMLStyleSheets(['all', 'bulma', 'main']);
    $scripts = getHTMLScripts(['jq', 'main']);
    $head = template('head', ['title' => 'Вход', 'stylesheets' => $stylesheets]);
    $header = template('header-admin');
    $main = template('adm_news', compact('alert'));
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