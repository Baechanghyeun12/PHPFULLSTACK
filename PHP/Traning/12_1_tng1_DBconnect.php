<?php
// 사번이 10005 이하 사번, 이름(성 이름), 성별, 생일


// DB 연결
$dbc = mysqli_connect( "localhost", "root", "root506", "employees", 3306);

// var_dump($dbc);

// 쿼리 요청
// mysqli_query($dbc, "쿼리");
$result_query = mysqli_query($dbc, "SELECT emp_no, CONCAT(last_name, ' ', first_name) AS fullname, gender, birth_date FROM employees WHERE emp_no <= 10005;"); // DB에 요청한 쿼리를 배열로 가지고 와서 변수에 담는다.



// mysqli_num_rows() 를 이용해서 레코드 수를 체크 하는 방법
if(mysqli_num_rows($result_query) === 0)
{
    echo "값없음";
}
else {
    while($temp_row = mysqli_fetch_assoc($result_query)) // 연상배열로 가지고 온다.
    {
        $a = implode("\n", $temp_row);
        $a .= "\n\n";
        echo $a;
    }
}

// 플레그를 이용하는 방법
$flg_cnt = false;
while( $temp_row = mysqli_fetch_assoc($result_query))
{
    echo implode( " ", $temp_row), "\n";
    $flg_cnt = true;
}
if( !$flg_cnt)
{
    echo "데이터가 0건 입니다.";
}


mysqli_close($dbc);