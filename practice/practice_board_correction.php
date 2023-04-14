<?php
    define("DB_CON",$_SERVER['DOCUMENT_ROOT'].'/practice/');
    define("DB_CON1",DB_CON.'common.php');
    define("HEARDER_H1",DB_CON.'practice_header.php');
    include_once(DB_CON1);
    $req_mth = $_SERVER["REQUEST_METHOD"];
    if($req_mth === "POST")
    {
        $arr_post = $_POST;


        update_update_info($arr_post);
        
        $arr_prepare =
                array(
                    ":board_no" => $arr_post["board_no"]
                );

        $pdo = null;
        $pdo = db_conn();
        $stmt = $pdo->prepare("SELECT * FROM board_info WHERE board_no = :board_no");
        $stmt->execute($arr_prepare);
        $result_info1 = $stmt->fetchAll();
        $result_cnt = count($result_info1);
        $pdo = null;

        $arr_get = $result_info1[0];
        header("Location: practice_board_detail.php?board_no=".$arr_get["board_no"]."&board_contents=".$arr_get["board_contents"]."&board_title=".$arr_get["board_title"]);
        exit();
    }
    else
    {
        $arr_get = $_GET;
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
<form action="" method="post" >
        <label for="board_title">게시글 번호</label>
        <br>
        <input type="text" name="board_no" id="board_no" value="<?php echo $arr_get["board_no"]?>" readonly>
        <br>
        <label for="board_title">게시글 제목</label>
        <br>
        <input type="text" name="board_title" id="board_title" value="<?php echo $arr_get["board_title"]?>" required>
        <br>
        <label for="board_contents">게시글 내용</label>
        <br>
        <input type="text" name="board_contents" id="board_contents" value="<?php echo $arr_get["board_contents"]?>" required>
        <br>
        <button type="submit">확인</button>
        <button type="button"><a href="practice_board_detail.php?board_no=<?php echo $arr_get["board_no"] ?>&board_title=<?php echo $arr_get["board_title"] ?>&board_contents=<?php echo $arr_get["board_contents"] ?>">취소</a></button>
    </form>
</body>
</html>
