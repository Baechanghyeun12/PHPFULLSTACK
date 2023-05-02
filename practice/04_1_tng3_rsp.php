

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="id_r">입력</label>
        <input type="number" id="id_r" name="id_r">
        <button type="submit">가위바위보</button>
    </form>
    <?php
    $com=rand(0, 2);
    $user=(int)$_POST['id_r'];
    $rsp = "";
    $sci="찌";
    $rock="묵";
    $pap="빠";
if($user < 0 || $user > 2)
{
    $rsp = "잘못된 값을 입력 했습니다.";
}
else
{
    if($com === 0 && $user === 0)
    {
        $rsp="컴퓨터 = ".$sci."\n"."유저 = ".$sci."\n"."비겼습니다.";
    }
    else if($com === 0 && $user === 1)
    {
        $rsp="컴퓨터 = ".$sci."\n"."유저 = ".$rock."\n"."유저가 이겼습니다.";
    }
    else if($com === 0 && $user ===2)
    {
        $rsp="컴퓨터 = ".$sci."\n"."유저 = ".$pap."\n"."컴퓨터가 이겼습니다.";
    }
    else if($com === 1 && $user ===0)
    {
        $rsp="컴퓨터 = ".$rock."\n"."유저 = ".$sci."\n"."컴퓨터가 이겼습니다.";
    }
    else if($com === 1 && $user ===1)
    {
        $rsp="컴퓨터 = ".$rock."\n"."유저 = ".$rock."\n"."비겼습니다.";
    }
    else if($com === 1 && $user ===2)
    {
        $rsp="컴퓨터 = ".$rock."\n"."유저 = ".$pap."\n"."유저가 이겼습니다.";
    }
    else if($com === 2 && $user ===0)
    {
        $rsp="컴퓨터 = ".$pap."\n"."유저 = ".$sci."\n"."유저가 이겼습니다.";
    }
    else if($com === 2 && $user === 1)
    {
        $rsp="컴퓨터 = ".$pap."\n"."유저 = ".$rock."\n"."컴퓨터가 이겼습니다.";
    }
    else if($com === 2 && $user === 2)
    {
        $rsp="컴퓨터 = ".$pap."\n"."유저 = ".$pap."\n"."비겼습니다.";
    }
    
}
echo $rsp;
?>



</body>
</html>