<?php 
    session_start();
    $RESOURCEPATH = $_SERVER['SERVER_NAME'] . $_SERVER['CONTEXT_PREFIX'] . "/SIBD";
    if($_SERVER['CONTEXT_DOCUMENT_ROOT'])
        define('DB_PATH',  $_SERVER['CONTEXT_DOCUMENT_ROOT']. "/SIBD" . '/mydatabase.db');
    else
        define('DB_PATH',  "/SIBD/mydatabase.db");
    $dataB = new PDO('sqlite:' . DB_PATH);
    $dataB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dataB->exec( 'PRAGMA foreign_keys = ON;' );
?>
