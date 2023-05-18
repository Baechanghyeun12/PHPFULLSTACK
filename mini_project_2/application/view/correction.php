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
    <form action="/user/correction" method="post">
        <input type="hidden" name="u_no" value="<?php if(isset($this->u_info["u_no"])) {echo $this->u_info["u_no"];}else if(isset($this->u_info1["u_no"])){echo $this->u_info1["u_no"];} ?>">
        <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" class="form-control" name="u_id" id="id" readonly value="<?php  if(isset($this->u_info["u_id"])) {echo $this->u_info["u_id"];}else if(isset($this->u_info1["u_id"])){echo $this->u_info1["u_id"];} ?>">
        </div>
        <span style="color: red;">
            <?php if(isset($this->errMsg)) {
                echo $this->errMsg;
            } ?>
        </span>
        <span id="errMsgId" style="color: red;">
            <?php if(isset($this->arrChkErr["u_id"])) {
                echo $this->arrChkErr["u_id"];
            } ?>
        </span>
        <div class="mb-3">
        <label for="u_name" class="form-label">이름</label>
        <input type="text" class="form-control" name="u_name" id="u_name" placeholder="비밀번호를 입력하세요." autocomplete="off" required value="<?php if(isset($this->u_info["u_name"])) {echo $this->u_info["u_name"];}else if(isset($this->u_info1["u_name"])){echo $this->u_info1["u_name"];} ?>">
        </div>
        <span style="color: red;">
            <?php if(isset($this->arrChkErr["u_name"])) {
                echo $this->arrChkErr["u_name"];
            } ?>
        </span>
        <div class="mb-3">
        <label for="u_nickname" class="form-label">닉네임</label>
        <input type="text" class="form-control" name="u_nickname" id="u_nickname" placeholder="비밀번호를 입력하세요." autocomplete="off" required value="<?php if(isset($this->u_info["u_nickname"])) {echo $this->u_info["u_nickname"];}else if(isset($this->u_info1["u_nickname"])){echo $this->u_info1["u_nickname"];} ?>">
        </div>
        <span style="color: red;">
            <?php if(isset($this->arrChkErr["u_nickname"])) {
                echo $this->arrChkErr["u_nickname"];
            } ?>
        </span>
        <div class="mb-3">
        <label for="u_tel" class="form-label">전화번호</label>
        <input type="tel" class="form-control" name="u_tel" id="u_tel" placeholder="비밀번호를 입력하세요." autocomplete="off" required value="<?php if(isset($this->u_info["u_tel"])) {echo $this->u_info["u_tel"];}else if(isset($this->u_info1["u_tel"])){echo $this->u_info1["u_tel"];} ?>">
        </div>
        <span style="color: red;">
            <?php if(isset($this->arrChkErr["u_tel"])) {
                echo $this->arrChkErr["u_tel"];
            } ?>
        </span>
        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="u_email" id="email" placeholder="비밀번호를 입력하세요." autocomplete="off" required value="<?php if(isset($this->u_info["u_email"])) {echo $this->u_info["u_email"];}else if(isset($this->u_info1["u_email"])){echo $this->u_info1["u_email"];} ?>">
        </div>
        <span style="color: red;">
            <?php if(isset($this->arrChkErr["u_email"])) {
                echo $this->arrChkErr["u_email"];
            } ?>
        </span>
        <span style="color: red;">
            <?php if(isset($this->arrChkErr["u_email1"])) {
                echo $this->arrChkErr["u_email1"];
            } ?>
        </span>
        <span style="color: red;">
            <?php if(isset($this->arrChkErr["u_email2"])) {
                echo $this->arrChkErr["u_email2"];
            } ?>
        </span>
        <br>
        <div >
            <button type="submit" >변경</button>
            <button type="button" onclick="location.href='/user/pwCorrection'">비밀번호 변경</button>
            <button type="button" onclick="location.href='/user/myPage'">취 소</button>
        </div>
    </form>
    <script src="/application/view/common.js"></script>
</body>
</html>