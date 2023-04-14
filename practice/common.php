<?php
function db_conn()
{
    $host = "localhost";
    $user ="root";
    $pass = "root506";
    $charset = "utf8mb4";
    $db_name = "board";
    $dns = "mysql:host=".$host.";dbname=".$db_name.";charset=".$charset;
    $pdo_option =
        array(
            PDO::ATTR_EMULATE_PREPARES      => false
            ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
            ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
        );
        $pdo = new PDO($dns,$user,$pass,$pdo_option);
        return $pdo;
}

// $pdo = null;
// $pdo = db_conn();
// $stmt = $pdo->prepare("SELECT * FROM board_info");
// $stmt->execute();
// $result_info = $stmt->fetchAll();
// var_dump($result_info);
// $pdo = null;
function update_insert_info(&$param_arr)
{
    $sql =
    " INSERT INTO board_info ("
    ." board_title "
    ." ,board_contents "
    ." ,board_write_date "
    ." ) "
    ." VALUES ("
    ." :board_title "
    ." ,:board_contents "
    ." ,NOW() "
    ." ) "
    ;

    $arr_prepare =
            array(
                ":board_title" =>$param_arr["board_title"]
                ,":board_contents" =>$param_arr["board_contents"]
            );

    $pdo = null;
    $pdo = db_conn();
    $pdo->begintransaction();
    $stmt = $pdo->prepare( $sql );
    $stmt->execute( $arr_prepare );
    $board_up_count = $stmt->rowCount();
    $pdo->commit();
    $pdo = null;
}




function update_update_info(&$param_arr)
{
    $sql =
    " UPDATE "
    ."       board_info "
    ." SET "
    ."       board_title = :board_title "
    ."       ,board_contents = :board_contents "
    ." WHERE "
    ."       board_no = :board_no "
    ;

    $arr_prepare =
            array(
                ":board_title" =>$param_arr["board_title"]
                ,":board_contents" =>$param_arr["board_contents"]
                ,":board_no" =>$param_arr["board_no"]
            );

    $pdo = null;
    $pdo = db_conn();
    $pdo->begintransaction();
    $stmt = $pdo->prepare( $sql );
    $stmt->execute( $arr_prepare );
    $board_up_count = $stmt->rowCount();
    $pdo->commit();
    $pdo = null;
}


function update_delete_info(&$param_arr)
{
    $sql =
    " UPDATE "
    ."       board_info "
    ." SET "
    ."       board_del_flg = '1' "
    ." WHERE "
    ."       board_no = :board_no "
    ;

    $arr_prepare =
            array(
                ":board_no" =>$param_arr["board_no"]
            );

    $pdo = null;
    $pdo = db_conn();
    $pdo->begintransaction();
    $stmt = $pdo->prepare( $sql );
    $stmt->execute( $arr_prepare );
    $board_up_count = $stmt->rowCount();
    $pdo->commit();
    $pdo = null;
}

function serch_board(&$param_serch)
{
    $sql =
    " SELECT "
	." board_no "
	." ,board_title "
    ." ,board_contents "
	." ,board_write_date "
    ." FROM "
	." board_info "
    ." WHERE "
	." board_del_flg = '0' "
    ." AND board_title LIKE CONCAT('%',:serch,'%') "
    ." ORDER BY "
	." board_no DESC "
    ;

    $arr_prepare =
            array(
                ":serch" => $param_serch["serch"]
            );

    $pdo = null;
    $pdo = db_conn();
    $stmt = $pdo->prepare( $sql );
    $stmt->execute( $arr_prepare );
    $result_info = $stmt->fetchAll();
    $pdo = null;

    return $result_info;

}
