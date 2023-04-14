<?php
    define("DB_CON",$_SERVER['DOCUMENT_ROOT'].'/practice/');
    define("DB_CON1",DB_CON.'common.php');
    define("HEARDER_H1",DB_CON.'practice_header.php');
    include_once(DB_CON1);

    $req_mt = $_SERVER["REQUEST_METHOD"];
    if($req_mt === "POST")
    {
    $arr_get = $_POST;

    $arr_prepare=
            array(
                "board_title" => $arr_get["board_title"]
                ,"board_contents" => $arr_get["board_contents"]
            );

    update_insert_info($arr_prepare);
    header('Location:practice_board_list.php');
    exit();
        }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./practice_board.css">
    <title>Document</title>
</head>
<body>
<?php include_once(HEARDER_H1);?>
    <form action="practice_board_update.php" method="post">
        <label for="board_title">게시글 제목</label>
        <br>
        <input type="text" name="board_title" id="board_title" required>
        <br>
        <label for="board_contents">게시글 내용</label>
        <br>
        <input type="text" name="board_contents" id="board_contents" required>
        <br>
        <button type="submit">확인</button>
        <button type="button"><a href="practice_board_list.php">취소</a></button>
    </form>
</body>
</html>