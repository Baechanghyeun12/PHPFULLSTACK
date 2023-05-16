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
    <?php var_dump($this->model->getUserID($arrPost["u_no"],false))?>
        <?php if(isset($this->errMsg2)) {
            echo $this->errMsg2;
        } ?>
    <form action="/user/correction" method="post">
        <input type="hidden" name="u_no" value="<?php if(isset($this->u_info["u_no"])) {echo $this->u_info["u_no"];} ?>">
        <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" class="form-control" name="u_id" id="id" placeholder="ID를 입력하세요" autocomplete="off" required value="<?php if(isset($this->u_info["u_id"])) {echo $this->u_info["u_id"];} ?>">
        </div>
        <span>
            <?php if(isset($this->arrChkErr["u_id"])) {
                echo $this->arrChkErr["u_id"];
            } ?>
        </span>
        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="u_email" id="email" placeholder="비밀번호를 입력하세요." autocomplete="off" required value="<?php if(isset($this->u_info["u_email"])) {echo $this->u_info["u_email"];} ?>">
        </div>
        <span>
            <?php if(isset($this->arrChkErr["u_email"])) {
                echo $this->arrChkErr["u_email"];
            } ?>
        </span>
        <br>
        <div >
            <button type="submit" >변경</button>
            <button type="button" onclick="location.href='/user/myPage'">취 소</button>
        </div>
    </form>
</body>
</html>