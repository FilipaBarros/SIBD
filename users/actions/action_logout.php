<?php
    require_once('../../config/init.php');
    session_destroy();
    header('Location: http://'.$RESOURCEPATH.'/index.php');
?>
