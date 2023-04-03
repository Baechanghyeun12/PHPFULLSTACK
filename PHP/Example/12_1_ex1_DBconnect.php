<?php

// DB 연결
$dbc = mysqli_connect( "localhost", "root", "root506", "employees", 3306);

// var_dump($dbc);

// 쿼리 요청
// mysqli_query($dbc, "쿼리");
// $result_query = mysqli_query($dbc, "SELECT emp_no, first_name FROM employees LIMIT 10;"); // DB에 요청한 쿼리를 배열로 가지고 와서 변수에 담는다.

// Prepared Statement : 
$i1 = "F";
$i2 = 10010;
$i3 = 5;
$stmt = $dbc->stmt_init();  //statement 셋팅
$stmt->prepare("SELECT emp_no, first_name FROM employees WHERE gender = ? AND emp_no <= ? LIMIT ?"); // DB 질의할 쿼리를 작성
$stmt->bind_param( "sii",$i1, $i2, $i3 ); // Prepared 셋팅 (변수를 설정해서 넣어야된다.) 물음표(?)의 순서대로 적어준다.
// "i" = int ,"s" = string ,"b" ,"d" 만 들어갈수 있다.
$stmt->execute(); // DB에 쿼리 질의 실행

//---------------------------- 질의 결과를 우리가 지정한 변수에 담아 사용하는 방법-------------------
// $stmt->bind_result( $col1, $col2); // 질의 결과를 각 아규먼트에 저장하기 위한 셋팅
// $stmt->fetch(); // brind_result에서 셋팅한 아규먼트에 값을 저장(한번 실행 될때마다 한 레코드씩 저장)
// var_dump($col1, $col2);


// 패치를 루프로 돌려서 모든 질의 결과를 가져오는 방법 : 레코드가 하나만 나올때 사용하면 유용하다.
// while($stmt->fetch())
// {
//     echo "$col1 $col2\n";
// }


// ----------------------- 이하 연상배열로 가져오는 방법 -----------
// 대부분은 연상배열로 가져와서 사용한다.
$result = $stmt->get_result(); // 질의 결과를 저장

while($row = $result->fetch_assoc())
{
    echo $row["emp_no"],"\n",$row["first_name"],"\n";
}




// while($temp_row = mysqli_fetch_row($result_query)) // 키값으로 가지고 온다.
// {
//     var_dump($temp_row);
// }






// while($temp_row = mysqli_fetch_assoc($result_query)) // 연상 배열로 가지고 온다. mysqli_fetch_assoc() : 배열을 한줄씩 가지고 오는 함수이다.
// {
//     var_dump($temp_row["first_name"]);
// }


// 플레그를 이용하는 방법
// $flg_cnt = false;
// while( $temp_row = mysqli_fetch_assoc($result_query))
// {
//     echo implode( " ", $temp_row), "\n";
//     $flg_cnt = true;
// }
// if( !$flg_cnt)
// {
//     echo "데이터가 0건 입니다.";
// }


// mysqli_num_rows() 를 이용해서 레코드 수를 체크 하는 방법
// if(mysqli_num_rows($result_query) === 0)
// {
//     echo "값없음";
// }
// else {
//     while($temp_row = mysqli_fetch_assoc($result_query)) // 키값으로 가지고 온다.
//     {
//         $a = implode("\n", $temp_row);
//         $a .= "\n\n";
//         echo $a;
//     }
// }




// DB연결 종료는 꼭 해줘야 된다.
mysqli_close($dbc);
// $dbc->cose();