<?php
// 1. GET Method로 데이터를 넘겨주는 방법 1    (물음표 뒷부분을 쿼리스트링이라고 부른다.)
// -Query String에 키와 값을 셋팅 해준다.
// http://localhost/mini_board/src/board_list.php?board_no=1 값을 하나만 설정했을때

// 프로토콜     : http:
// 도매인       : localhost
// 패스         : mini_board/src/board_list.php
// 쿼리스트링   : ?board_no=1

// http://localhost/mini_board/src/board_list.php?board_no=1&key1=10 엔드(&)로 연결하여서 복수로 값을 설정해줄수 있다.



?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- // 1-2. form Tag를 이용하는 방법 -->
    <form method="get" action="20_1_ex2_httpget.php">
        <input type="text" name="test1" value="testValue1">
        <input type="text" name="test2" value="testValue2">
        <button type="submit">Submit</button>
        <!-- http://localhost/20_1_ex1_http_get_method.php?test1=testValue1 -->
    </form>
    <br>
    <br>
    <br>
    <a href="20_1_ex2_httpget.php">A태그</a>
</body>
</html>
