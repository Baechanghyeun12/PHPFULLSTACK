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
        <span style="color: red;">
            <?php if(isset($this->errMsg2)) {
                echo $this->errMsg2;
            } ?>
        </span>
    <form action="/user/pwCorrection" method="post">
        <input type="hidden" name="u_no" value="<?php if(isset($this->u_info["u_no"])) {echo $this->u_info["u_no"];}else if(isset($this->u_info1["u_no"])){echo $this->u_info1["u_no"];} ?>">
        <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" class="form-control" name="u_id" id="id" readonly value="<?php  if(isset($this->u_info["u_id"])) {echo $this->u_info["u_id"];}else if(isset($this->u_info1["u_id"])){echo $this->u_info1["u_id"];} ?>">
        </div>
        <span style="color: red;">
            <?php if(isset($this->arrChkErr["u_pw"])) {
                echo $this->arrChkErr["u_pw"];
            } ?>
        </span>
        <span style="color: red;">
            <?php if(isset($this->arrChkErr["u_pwb"])) {
                echo $this->arrChkErr["u_pwb"];
            } ?>
        </span>
        <div class="mb-3">
        <label for="u_pw" class="form-label">현재 비밀번호</label>
        <input type="password" class="form-control" name="u_pw" id="u_pw" placeholder="현재 비밀번호를 입력하세요." autocomplete="off" required>
        </div>
        <span style="color: red;">
            <?php if(isset($this->arrChkErr["pwChk1"])) {
                echo $this->arrChkErr["pwChk1"];
            } ?>
        </span>
        <span style="color: red;">
            <?php if(isset($this->arrChkErr["u_pwc"])) {
                echo $this->arrChkErr["u_pwc"];
            } ?>
        </span>
        <span style="color: red;">
            <?php if(isset($this->arrChkErr["u_pwcb"])) {
                echo $this->arrChkErr["u_pwcb"];
            } ?>
        </span>
        <div class="mb-3">
        <label for="u_pwc" class="form-label">변경 비밀번호</label>
        <input type="password" class="form-control" name="u_pwc" id="u_pwc" placeholder="변경할 비밀번호를 입력하세요." autocomplete="off" required>
        </div>
        <span style="color: red;">
            <?php if(isset($this->arrChkErr["u_pwc1"])) {
                echo $this->arrChkErr["u_pwc1"];
            } ?>
        </span>
        <span style="color: red;">
            <?php if(isset($this->arrChkErr["pwChk"])) {
                echo $this->arrChkErr["pwChk"];
            } ?>
        </span>
        <br>
        <div >
            <button type="submit" >변경</button>
            <button type="button" onclick="location.href='/user/myPage'">취 소</button>
        </div>
    </form>
    <?php
        if(isset($this->signUpFlg)){
    ?>
        <script>
            alert('비밀번호가 변경 되었습니다.');
        </script>
    <?php
        }
    ?>
</body>
</html>