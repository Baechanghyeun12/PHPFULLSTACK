<?php

// DB 연결
$dbc = mysqli_connect( "localhost", "root", "root506", "employees", 3306);

// var_dump($dbc);

// 쿼리 요청
// mysqli_query($dbc, "쿼리");
$result_query = mysqli_query($dbc, "SELECT emp_no, first_name FROM employees LIMIT 10;"); // DB에 요청한 쿼리를 배열로 가지고 와서 변수에 담는다.

// while($temp_row = mysqli_fetch_row($result_query)) // 키값으로 가지고 온다.
// {
//     var_dump($temp_row);
// }

while($temp_row = mysqli_fetch_assoc($result_query)) // 연상 배열로 가지고 온다. mysqli_fetch_assoc() : 배열을 한줄씩 가지고 오는 함수이다.
{
    var_dump($temp_row["first_name"]);
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


// mysqli_num_rows() 를 이용해서 레코드 수를 체크 하는 방법
if(mysqli_num_rows($result_query) === 0)
{
    echo "값없음";
}
else {
    while($temp_row = mysqli_fetch_assoc($result_query)) // 키값으로 가지고 온다.
    {
        $a = implode("\n", $temp_row);
        $a .= "\n\n";
        echo $a;
    }
}
mysqli_close($dbc);