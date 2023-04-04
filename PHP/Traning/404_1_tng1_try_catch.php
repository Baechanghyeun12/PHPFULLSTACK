<?php
// 아래 쿼리를 이용해서 DB접속 > data획득 후 출력해 주세요.
include_once("../Example/12_2_ex2_fnc_db_conn.php");
// try-catch로 에러 처리를 해 주세요.
// 에러가 날 경우의 해당 Exception의 에러메세지를 출력해 주세요.
// 정상 종료일 경우 "정상종료"라고 출력해 주세요.
// $sql1 = " SELECT * FROM department ";
// $sql2 = " SELECT * FROM dept_manager ";
// try
// {
//     $obj_conn = null ;
//     my_db_conn($obj_conn);
//     $sql1 = " SELECT * FROM department ";
//     $stmt = $obj_conn->query($sql1);
//     $result = $stmt->fetchAll();
//     echo "정상종료";
// }
// catch (Exception $e)
// {
//     echo "------------에러 메세지------------\n";
//     echo $e->getmessage();
//     echo "\n------------에러 메세지------------";
// }
// finally
// {
//     $obj_conn = null;
// }
// try
// {
//     $obj_conn = null ;
//     my_db_conn($obj_conn);
//     $sql2 = " SELECT * FROM dept_manager ";
//     $stmt = $obj_conn->query($sql2);
//     $result = $stmt->fetchAll();
//     echo "\n정상종료";
// }
// catch (Exception $e)
// {
//     echo "------------에러 메세지------------\n";
//     echo $e->getmessage();
//     echo "\n------------에러 메세지------------";
// }
// finally
// {
//     $obj_conn = null;
// }


try
{
    $obj_conn = null ;
    my_db_conn($obj_conn);
    $sql1 = " SELECT * FROM department ";
    $stmt1 = $obj_conn->query($sql1);
    $result = $stmt1->fetchAll();

    $sql2 = " SELECT * FROM dept_manager ";
    $stmt2 = $obj_conn->query($sql2);
    $result2 = $stmt2->fetchAll();
    var_dump($result, $result2); //var_dump()는 상세내용이 전부 나오므로 확인용으로 사용하고 무조건 삭제해야 된다.
    echo "\n정상종료";
}
catch (Exception $e)
{
    echo "------------에러 메세지------------\n";
    echo $e->getmessage();
    echo "\n------------에러 메세지------------";
}
finally
{
    $obj_conn = null;
}