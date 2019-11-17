<?php 
    session_start();
    define('DB_PATH', $_SERVER['DOCUMENT_ROOT'] . '/SIBD/mydatabase.db');
    $dataB = new PDO('sqlite:' . DB_PATH);
    $dataB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
