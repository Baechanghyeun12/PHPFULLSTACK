<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="movie_login.css">
    <title>Document</title>
</head>
<body>
    <form action="/user/idSearch" method="post">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control" name="u_email" id="exampleFormControlInput1" placeholder="Email을 입력하세요" autocomplete="off" required>
        </div>
        <br>
        <div >
            <button type="submit" >확인</button>
            <button type="button" onclick="location.href='/user/login'">취 소</button>
        </div>
    </form>
    <h3 style="color: red;">
        <?php
        if(isset($this->errMsg)){
            echo $this->errMsg;
        } else if(isset($this->u_id)){
            echo $this->u_id;
        }
        ?>
    </h3>
</body>
</html>