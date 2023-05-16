<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <?php if(isset($this->errMsg)) { ?>
        <div><span><?php echo $this->errMsg; ?></span></div>
    <?php } ?>
    <form action="/user/signup" method="post">
        <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" class="form-control" name="u_id" id="id" placeholder="ID를 입력하세요" autocomplete="off" required>
        <button type="button" onclick="chkDuplicationID();">중복체크</button>
        </div>
        <span id="errMsgId">
            <?php if(isset($this->arrChkErr["u_id"])) {
                echo $this->arrChkErr["u_id"];} 
                ?>
        </span>
        <div class="mb-3">
        <label for="pw" class="form-label">PW</label>
        <input type="password" class="form-control" name="u_pw" id="pw" placeholder="비밀번호를 입력하세요." autocomplete="off" required>
        </div>
        <span>
            <?php if(isset($this->arrChkErr["u_pw"])) {
                echo $this->arrChkErr["u_pw"];}
            ?>
        </span>
        <div class="mb-3">
        <label for="pwCheck" class="form-label">PW확인</label>
        <input type="password" class="form-control" name="pwChk" id="pwChk" placeholder="비밀번호를 입력하세요." autocomplete="off" required>
        </div>
        <span>
            <?php if(isset($this->arrChkErr["pwChk"])) {
                echo $this->arrChkErr["pwChk"];
            } ?>
        </span>
        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="u_email" id="email" placeholder="Email를 입력하세요." autocomplete="off" required>
        </div>
        <span>
            <?php if(isset($this->arrChkErr["u_email"])) {
                echo $this->arrChkErr["u_email"];
            } ?>
        </span>
        <br>
        <div >
            <button type="submit" >가입</button>
            <button type="button" onclick="location.href='/user/login'">취 소</button>
        </div>
    </form>
    <script src="/application/view/common.js"></script>
    <?php
        if( isset($this->signUpFlg) ){
    ?>
        <script>
            alert('회원가입이 되었습니다.');
            location.href = '/movie/main';
        </script>
    <?php
        }
    ?>
</body>
</html>