<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="/application/view/bootstrap.css">
    <title>bootstrap</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(229, 243, 254);">
        <div class="container-fluid">
            <a class="navbar-brand" href="/movie/main"><h1>BBB</h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 margin_center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/user/movielist">영화</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">예매</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">영화관</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"  aria-disabled="true">이벤트</a>
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <?php
            if(isset($_SESSION["u_id"])){?>
                <a href="/user/myPage"><?php echo "안녕하세요".$_SESSION["u_id"]."님";?></a>
                <button id="logout" onclick="redirectLogout();">Logout</button>
                <?php
            }
            else{
                ?>
            <button type="button" class="log_button" onclick="location.href='/user/login'">로그인</button>
            <?php
            }
            ?>
            <script>
                function redirectLogout(){
                    location.href = "/user/logout";
                }
            </script>
        </div>
    </nav>
    <h1>영화</h1>
    <br>
    <div id="search">
        <input type="text" id="searchApi" placeholder="영화제목 검색">
        <button type="submit" onclick="movieSearch()">검색</button>
        <input type="text" id="searchApiGenre" placeholder="감독명으로 영화 검색">
        <button type="submit" onclick="movieGenreSearch()">검색</button>
        <?php
        // 보여질 년도의 범위 - 현재년부터 100년전까지 표시됩니다.
        $yearRange = 100;
        // 선택되어질 년도 - 현재년 기준 20년전의 년도가 선택되어집니다.
        $ageLimit = 0;
        $currentYear = date('Y');
        $startYear = ($currentYear - $yearRange);
        $selectYear = ($currentYear - $ageLimit);
        echo '<select id="startYear">';
            foreach (range($currentYear, $startYear) as $year) {
                $selected = "";
                if($year == $selectYear) { $selected = " selected"; }
                echo '<option' . $selected . '>' . $year . '</option>';
            }
        echo '</select>';
        ?>
        <?php
        // 보여질 년도의 범위 - 현재년부터 100년전까지 표시됩니다.
        $yearRange = 100;
        // 선택되어질 년도 - 현재년 기준 20년전의 년도가 선택되어집니다.
        $ageLimit = 0;
        $currentYear = date('Y');
        $startYear = ($currentYear - $yearRange);
        $selectYear = ($currentYear - $ageLimit);
        echo '<select id="endYear">';
            foreach (range($currentYear, $startYear) as $year) {
                $selected = "";
                if($year == $selectYear) { $selected = " selected"; }
                echo '<option' . $selected . '>' . $year . '</option>';
            }
        echo '</select>';
        ?>
        <button type="submit" onclick="movieYearSearch()">검색</button>
    </div>
    <br>
    <h2>검색 결과</h2>
    <br>
    <div class="container">
        <div id="a" class="row row-cols-5">
        </div>
    </div>
    <br>
    <h2>일간 박스오피스 순위</h2>
    <br>
    <div class="container">
        <div id="b" class="row row-cols-5">
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h2>주간 박스오피스 순위</h2>
    <br>
    <div class="container">
        <div id="c" class="row row-cols-5">
        </div>
    </div>
    <script>
        window.onload = (() => {
    boxOfficeMovie();
    boxOfficeMovieWeek();
});
    </script>
    <script src="/application/view/common.js"></script>

    
</body>
</html>