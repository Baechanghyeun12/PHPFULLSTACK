<?php
// 아래 쿼리로 결과를 출력하는 프로그램을 만들어 주세요.

// ------------쿼리--------------
// SELECT emp_no, salary FROM salaries WHERE to_date = ? AND salary >= ? ORDER BY salary DESC LIMIT ?

// -------------prepare 셋팅값-----------
//to_date : 9999-01-01
//salary : 50000
//limit : 5

$tdate = 99990101;
$sal = 50000;
$lim = 5;


$db_c = mysqli_connect("localhost", "root", "root506", "employees", 3306); // DB 연결
$stmt = $db_c->stmt_init(); // mysqli_stmt_prepare를 사용하기 위한 객체를 초기화하고 리턴해 줍니다.
$stmt->prepare(" SELECT emp_no, salary FROM salaries WHERE to_date = ? AND salary >= ? ORDER BY salary DESC LIMIT ? ");
$stmt->bind_param( "sii",$tdate, $sal, $lim ); // prepared statement의 값을 셋팅
$stmt->execute(); // 쿼리를 실행(DB에 쿼리를 요청한다.)
$result = $stmt->get_result(); // DB에 쿼리를 요청해서 받은 결과값을 저장한다.

while($row = $result->fetch_assoc())
{
    echo $row["emp_no"],"  ",$row["salary"],"\n";
}

// DB와의 연결을 종료한느 방법
// mysqli_close($db_c);
$db_c->close();