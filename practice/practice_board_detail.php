<?php
    define("DB_CON",$_SERVER['DOCUMENT_ROOT'].'/practice/');
    define("DB_CON1",DB_CON.'common.php');
    define("HEARDER_H1",DB_CON.'practice_header.php');
    include_once(DB_CON1);

    $arr_get = $_GET;
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
    <p>게시글 번호 : <?php echo $arr_get["board_no"] ?></p>
    <br>
    <p>게시글 제목 : <?php echo $arr_get["board_title"] ?></p>
    <br>
    <p>게시글 내용 : <?php echo $arr_get["board_contents"] ?></p>
    <br>
    <button type="button"><a href="practice_board_correction.php?board_no=<?php echo $arr_get["board_no"] ?>&board_title=<?php echo $arr_get["board_title"] ?>&board_contents=<?php echo $arr_get["board_contents"] ?>">수정</a></button>
    <button type="button"><a href="practice_board_delete.php?board_no=<?php echo $arr_get["board_no"] ?>&board_title=<?php echo $arr_get["board_title"] ?>&board_contents=<?php echo $arr_get["board_contents"] ?>">삭제</a></button>
</body>
</html>