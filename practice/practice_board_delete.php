<?php
    define("DB_CON",$_SERVER['DOCUMENT_ROOT'].'/practice/');
    define("DB_CON1",DB_CON.'common.php');
    define("HEARDER_H1",DB_CON.'practice_header.php');
    include_once(DB_CON1);

    $arr_get = $_GET;

    update_delete_info($arr_get);

    header('Location:practice_board_list.php');
    exit();
?>