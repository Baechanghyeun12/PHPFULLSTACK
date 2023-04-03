<?php

// ---------------------------------
// 함수명   : my_db_conn
// 기능     : DB Connect
// 파라미터 : PDO  &$param_conn
// 리턴     : 없음
// ---------------------------------
function my_db_conn( &$param_conn )
{
    $db_host        = "localhost"; // 원래는 IP가 들어간다.
    $db_user        = "root";      // user
    $db_password    = "root506";   // password
    $db_name        = "employees"; // DB name
    $db_chareset    = "utf8mb4";   // charset
    $db_dns         = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_chareset;
    $db_option      =
        array(
            PDO::ATTR_EMULATE_PREPARES      => false // DB의 Prepared Statement 기능을 사용하도록 설정
            ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION // PDO EXCEPTION을 Throws하도록 설정
            ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC // 연상배열로 Fetch를 하도록 설정
        );
    // PDO Class로 DB 연동
    $param_conn = new PDO( $db_dns, $db_user, $db_password, $db_option );
}
// // 레퍼런스참조(&)에 대해서 알아보기-----------------???????????????????????????

// $obj_conn = null; // PDO Class

// // DB Connect
// my_db_conn( $obj_conn );

// // SQL
// $sql =
//     " SELECT "
//     ." * "
//     ."FROM "
//     ." employees  "
//     ." LIMIT :limit_start ";

// $arr_prepare =
//     array(
//     ":limit_start" => 5
//     );

// $stmt = $obj_conn->prepare($sql);
// $stmt->execute($arr_prepare);
// $result = $stmt->fetchAll();
// var_dump($result);

// $obj_conn = null; // DB Connection 파기