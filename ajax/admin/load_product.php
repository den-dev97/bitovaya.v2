<?php
    require_once('../../functions.php');
    extract($_POST);
    $data = $_POST;
    $file_tmp = $_FILES['img']['tmp_name'];
    $file_type = mime_content_type($file_tmp);
    $ext_mime_type = ['image/jpeg' => 'jpg', 'image/png' => 'png'];
    $file_name = "category$category-".uniqid() . '.' . $ext_mime_type[$file_type];
    $file_path = BASE_URL . "/assets/pic/";
    $file_url = $file_path . $file_name;
    move_uploaded_file($file_tmp, $file_path . $file_name);

    $data = array_merge($data, ['img' => $file_name]);

    $inserted = sqlInsert('products', $data);

    if($inserted){
        $products = getProducts();
        echo json_encode($products);
        exit();
    }





