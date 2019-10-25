<?php
    $host='127.0.0.1';
    $db = 'attendance_db';
    $user = 'root';
    $pass = 'p@ssw0rd';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO :: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Hello Database';
    }catch (PDOEXCEPTION $e){
        throw new PDOException($e->getmessage());
    }

    require_once 'crud.php';
    $crud = new crud ($pdo);
?>