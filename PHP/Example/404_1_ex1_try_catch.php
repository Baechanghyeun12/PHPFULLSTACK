<?php

include_once("./12_2_ex2_fnc_db_conn.php");

// try-catch 문 : 에러처리를 하기위한 문법

// try
// {
//     // 우리가 실행하고 싶은 소스코드를 작성
// }
// catch (Example $e)
// {
//     // 에러가 발생 했을 때 실행되는 소스코드를 작성
// }
// finally
// {
//     // 정상처리 또는 에러처리 시에 무조건 실행되는 소스코드를 작성
// }


try
{
    $obj_conn =( null );
    my_db_conn( $obj_conn );
    $sql = " SELECT * FROM employees WHERE emp_no = 1000000 ";
    $stmt = $obj_conn->query( $sql );
    $result = $stmt->fetchAll();

    // $result의 결과 값이 0개일때 강제로 오류를 일으키는 구문
    if( count( $result ) === 0 )
    {
        // throw Exception : 에러를 강제로 일으키는 구문
        throw new Exception("쿼리 결과 0건"); // 강제로 일으킬 오류의 메세지를 설정
    }

    var_dump( $result );
    echo "try\n";
}
// 오류가 있을때만 catch구문으로 들어가서 실행
catch( Exception $e)
{
    echo "---------에러 발생-------\n";
    echo $e->getmessage(); //개발자가 볼 수 있는 에러메세지를 보여준다.
    echo "\n---------에러 발생-------\n";
}
finally
{
    echo "Finally\n";
    $obj_conn = null;
}

echo "종료";
