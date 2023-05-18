<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>회원 정보</h1>
    <h2>회원 ID</h2>
    <?php if(isset($this->u_info["u_id"])){?>
        <p><?php echo $this->u_info["u_id"]?></p>
    <?php }?>
    <h2>회원 이름</h2>
    <?php if(isset($this->u_info["u_name"])){?>
        <p><?php echo $this->u_info["u_name"]?></p>
    <?php } ?>
    <h2>회원 닉네임</h2>
    <?php if(isset($this->u_info["u_nickname"])){?>
        <p><?php echo $this->u_info["u_nickname"]?></p>
    <?php } ?>
    <h2>회원 전화번호</h2>
    <?php if(isset($this->u_info["u_tel"])){?>
        <p><?php echo $this->u_info["u_tel"]?></p>
    <?php } ?>
    <h2>회원 Email</h2>
    <?php if(isset($this->u_info["u_email"])){?>
        <p><?php echo $this->u_info["u_email"]?></p>
    <?php } ?>
    <button type="button" onclick="location.href='/user/correction'">수정</button>
    <button type="button" onclick="location.href='/movie/main'">취 소</button>
</body>
</html>