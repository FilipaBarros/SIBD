<?php 
    session_start();
    /*$RESOURCEPATH = $_SERVER['SERVER_NAME'] . $_SERVER['CONTEXT_PREFIX'] . "/SIBD";
    if($_SERVER['CONTEXT_DOCUMENT_ROOT'])
        define('DB_PATH',  $_SERVER['CONTEXT_DOCUMENT_ROOT']. "/SIBD" . '/mydatabase.db');
    else
        define('DB_PATH',  "/SIBD/mydatabase.db");*/
    if( $_SERVER['SERVER_NAME'] != "_")
        $RESOURCEPATH = $_SERVER['SERVER_NAME'] . $_SERVER['CONTEXT_PREFIX'] . "/SIBD";
    else
        $RESOURCEPATH = $_SERVER['HTTP_HOST']."/SIBD";
    if(isset($_SERVER['CONTEXT_DOCUMENT_ROOT']))
        $SERVERPATH = $_SERVER['CONTEXT_DOCUMENT_ROOT']."/SIBD";
    else
        $SERVERPATH  = $_SERVER['DOCUMENT_ROOT']."/SIBD";
    
    define('DB_PATH',  $SERVERPATH . "/mydatabase.db");
    $dataB = new PDO('sqlite:' . DB_PATH);
    $dataB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dataB->exec( 'PRAGMA foreign_keys = ON;' );
?>
