<?php

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
$obj_conn = new PDO( $db_dns, $db_user, $db_password, $db_option ); // 변수명을 지정해주고 지정해준 변수명을 파라미터에 넣는ㄴ다.

// SELECT 예제
// // 사번 10001, 10002의 현재 연봉과 사번, 생일을 가져오는 쿼리를 작성해주세요.
// $sql =
//     " SELECT "
//     ." sal.salary "
//     .", emp.emp_no "
//     .", emp.birth_date "
//     ."FROM "
//     ." employees emp "
//         ." INNER JOIN salaries sal "
//         ."    ON emp.emp_no = sal.emp_no "
//     ." WHERE "
//     ." sal.to_date > NOW() "
//     ." AND "
//     ." ( "
//     ."  emp.emp_no = :emp_no1 "
//     ."  OR emp.emp_no = :emp_no2 "
//     ." ) ";

// $arr_prepare =
// array(
//     ":emp_no1" => 10001
//     ,":emp_no2" => 10002
// );

// $stmt = $obj_conn->prepare( $sql ); // Prepare Statement를 생성
// $stmt->execute( $arr_prepare ); // 쿼리 실행
// $result = $stmt->fetchAll(); // 쿼리 결과를 fetch
// var_dump( $result );

// INSERT 예제
$sql =
    " INSERT INTO departments( "
    ." dept_no "
    ." ,dept_name "
    ." ) "
    ." VALUES( "
    ." :dept_no "
    ." ,:dept_name "
    ." ) ";

$arr_prepare =
array(
    ":dept_no" => "d011"
    ,":dept_name" => "PHP풀스택"
);

$stmt = $obj_conn->prepare( $sql );
$result =$stmt->execute( $arr_prepare );
$obj_conn->commit();

// FLUSH PRIVILEGES;  데이터 베이스에서 최신상태로 리프레쉬(새로고침)해준다.

$obj_conn = null; // DB 파기


























