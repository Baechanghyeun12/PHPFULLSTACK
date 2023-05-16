<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <h3 style="color: red;"><?php echo isset($this->errMsg) ? $this->errMsg : "" ; ?></h3>
    <form action="/user/login" method="post">
        <label for="id">ID</label>
        <input type="text" name="u_id" id="id">
        <label for="pw">PW</label>
        <input type="text" name="u_pw" id="pw">
        <button type="submit">Login</button>
        <button type="button" onclick="location.href='/movie/main'">취소</button>
    </form>
    <a href="/user/signup">회원가입</a>
    <a href="/user/idSearch">아이디 찾기</a>
    <a href="/user/pwSearch">비밀번호 찾기</a>
</body>
</html>