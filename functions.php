<?php

session_start();//Старт сессии
//Параметры подключениия к бд
const DB_HOST = 'localhost';
const DB_NAME = 'bytovaya';
const DB_USER = 'root';
const DB_PASS = '';
const BASE_URL = __DIR__;


function dbGo()//Подключает бд, используя параметры
{
    try {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Ошибка подключения: " . $e->getMessage() . "<br/>";
        die();
    }
    return $db;
}


function sql($q): PDOStatement//Выполняет SQL запрос к бд
{
    try {
        $n = dbGo()->query($q);
    } catch (PDOException $e) {
        print "Ошибка : " . $e->getMessage() . "<br/>";
        die();
    }
    return $n;
}


function sqlInsert($table, $arrValues = []): int//Вставляет данные к таблицу бд
{

    $keys = array_keys($arrValues);
    $values = array_values($arrValues);
    $valuesPrepared = array_map(function ($item) {
        $type = gettype($item);
        if ($type === 'double' or $type === 'integer') {
            return $item;
        }
        return "'" . (string)$item . "'";
    }, $values);
    $keyesPrepared = array_map(function ($item) {
        return "`" . (string)$item . "`";
    }, $keys);
    $strKeys = implode(", ", $keyesPrepared);
    $strValues = implode(", ", $valuesPrepared);
    $query = "INSERT INTO $table ($strKeys) VALUES ($strValues)";
    if(empty($arrValues)){
        $query = "INSERT INTO $table VALUES()";
    }
     return dbGo()->exec($query);
}

function getCategories()//Получает список категорий из бд
{
    $q = "SELECT * FROM categories";
    return sql($q) -> fetchAll();
}

function getProducts($id = 0)//Получает список товаров из бд по номеру категории
{
    $q = "SELECT * FROM products";
    if($id) {
        $q .= " WHERE category='$id'";
    }
    return sql($q) -> fetchAll();
}

function getAvgEstimates($id){
    $q = "SELECT ROUND(AVG(rate), 2) AS rate FROM estimates WHERE `product_id`='$id'";
    return sql($q) -> fetch()['rate'];
}

function getNumberEstimates($id){
    $q = "SELECT COUNT(*) AS cnt FROM estimates WHERE `product_id`='$id'";
    return sql($q) -> fetch()['cnt'];
}

function delProduct($id){
    $q = "DELETE FROM products WHERE id='$id'";
    return sql($q);
}



function template(string $view, array $arr = [], string $path = './templates/'): string //Шаблонизация
{
    extract($arr);
    ob_start();
    include($path . $view . '.php');
    return ob_get_clean();
}



function getHTMLStyleSheets(array $paths):string
{
    $HTML = "";
    foreach($paths as $path){
        $HTML .= "\t";
        $HTML .= "<link rel=\"stylesheet\" href=\"assets/css/$path.css\">";
        $HTML .= PHP_EOL;
    }
    return $HTML;
}

function getHTMLScripts(array $paths):string
{
    $HTML = "";
    foreach($paths as $path){
        $HTML .= "\t";
        $HTML .= "<script src=\"assets/js/$path.js\"></script>";
        $HTML .= PHP_EOL;
    }
    return $HTML;
}

function initCookie(){//Устанавливает cookie в браузер, создаёт токен и записывает его в cookie и в бд
    $val = md5(time());
    setcookie('tok', $val);
    sqlInsert('cookies', ['token' => $val, 'content' => '{}']);
}

function dump($o){
    echo "<pre>" . print_r($o, true) . "</pre>";
}


