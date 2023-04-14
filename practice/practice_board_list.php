<?php
    define("DB_CON",$_SERVER['DOCUMENT_ROOT'].'/practice/');
    define("DB_CON1",DB_CON.'common.php');
    define("HEARDER_H1",DB_CON.'practice_header.php');
    include_once(DB_CON1);

    $req_mt = $_SERVER["REQUEST_METHOD"];

    if ($req_mt === "POST")
    {
        $arr_post = $_POST;

        $result_info1 = serch_board($arr_post);
        $result_cnt = count($result_info1);
    }
    else
    {
        $pdo = null;
        $pdo = db_conn();
        $stmt = $pdo->prepare("SELECT * FROM board_info WHERE board_del_flg = '0' ORDER BY board_no DESC");
        $stmt->execute();
        $result_info1 = $stmt->fetchAll();
        $result_cnt = count($result_info1);
        $pdo = null;
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
<button type="button"><a href="practice_board_update.php">작성</a></button>
    <form action="practice_board_list.php" method="post">
        <label for="serch">검색</label>
        <input type="text" id="serch" name="serch">
        <button type="submit">검색</button>
    </form>
    <table>
        <thead>
            <tr>
                <th >게시글 번호</th>
                <th >게시글 제목</th>
                <th >게시글 작성날짜</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // foreach($result_info as $val )
            //     {
                    for($i = 0; $i <= $result_cnt-1; $i++ )
                    {
            ?>
                    <tr>
                        <td>
                            <?php echo $result_info1[$i]["board_no"] ?>
                        </td>
                        <td>
                            <a href="practice_board_detail.php?board_no=<?php echo $result_info1[$i]["board_no"] ?>&board_title=<?php echo $result_info1[$i]["board_title"] ?>&board_contents=<?php echo $result_info1[$i]["board_contents"] ?>"><?php echo $result_info1[$i]["board_title"] ?></a>
                        </td>
                        <td>
                            <?php echo $result_info1[$i]["board_write_date"]?>
                        </td>
                    </tr>
            <?php
                    };
                // };
            ?>
        </tbody>
    </table>
</body>
</html>