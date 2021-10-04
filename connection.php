<?php
    $db_host = "localhost"; //ตัวแปลเก็บ localhost
    $db_user = "root"; //ถ้าใช้ xampp , username จะเป็น root
    $db_password = "";
    $db_name = "personnel_db"; //Database name
    try{
        $db = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        $e->getMessage();
    }

?>