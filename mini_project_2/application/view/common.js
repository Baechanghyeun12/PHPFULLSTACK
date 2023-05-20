

function chkDuplicationID(){
    const id = document.getElementById('id');
    
    const url = "/api/user?u_id=" + id.value;
    let apiData = null;
    // API
    fetch(url)
    .then(data => { return data.json(); })
    .then(apiData =>{
        const idspan = document.getElementById('errMsgId');
        if(apiData["flg"] === "1"){
            idspan.innerHTML = apiData["msg"];
        } else {
            idspan.innerHTML = "";
        }
    });
}

const id = document.getElementById('searchApi');
function movieSearch(){
    console.log(id.value);
    if(id.value.length !== 0){
    const url = "https://kobis.or.kr/kobisopenapi/webservice/rest/movie/searchMovieList.json?key=f5eef3421c602c6cb7ea224104795888&movieNm=" + id.value;
    let apiData = null;
    
    fetch(url)
    .then(data => { return data.json(); })
    .then(function(msg){
        // const idspan = document.getElementById('api');
        // const liNode = document.createElement("li");
        console.log(msg);
        // const data1 = apiData
        console.log(msg.movieListResult.movieList);
        // // for (i = 0; i < data1.boxOfficeResult.dailyBoxOfficeList.length; i++) {
        //     //     liNode.textContent = `${data1.boxOfficeResult.dailyBoxOfficeList.i["movieNm"]}`;
        //     //     idspan.appendChild(liNode);
        //     // } 
        // })
        // var item_int = 5
        var title = document.getElementById('a')
        title.innerHTML = "";
        for(var i =0; i<msg.movieListResult.movieList.length; i++){
            var div = document.createElement('div');
            var low_div = document.createElement('div')
            var title_div = document.createElement('div')
            var br = document.createElement('br');

            var mp = document.createElement('h3');
            mp.id = 'movieNm'
            var np = document.createElement('p');
            np.id = 'nationAlt'
            var gp = document.createElement('p');
            gp.id = 'genreAlt'
            var pp = document.createElement('p');
            pp.id = 'prdtYear'
            let aa = document.createElement('a');
            aa.id = 'alink'
            aa.setAttribute('href', `/api/movieInfo?movieCd=${short_url.movieCd}`)
            title_div.id = 'title_div'
            low_div.id = 'low_div'
            div.id = 'movies'
            var short_url = msg.movieListResult.movieList[i];
            
            console.log(short_url);
            div.appendChild(title_div)
            div.appendChild(low_div)
            aa.appendChild(div);
            title.appendChild(aa);

            var movieNm = document.createTextNode('제목 : '+short_url.movieNm);
            var nationAlt = document.createTextNode('국가 : '+short_url.nationAlt);
            var genreAlt = document.createTextNode('장르 : '+short_url.genreAlt);
            var prdtYear = document.createTextNode('개봉 : '+short_url.prdtYear);
            
            mp.appendChild(movieNm);
            np.appendChild(nationAlt);
            gp.appendChild(genreAlt);
            pp.appendChild(prdtYear);

            title_div.appendChild(mp);
            low_div.appendChild(np);
            low_div.appendChild(gp);
            low_div.appendChild(pp);
            low_div.appendChild(br);
        }})
    }
}
// boxOfficeResult
// boxofficeType
// dailyBoxOfficeList
const searchApiGenre = document.getElementById('searchApiGenre');
function movieGenreSearch(){
    console.log(searchApiGenre.value);
    if(searchApiGenre.value.length !== 0){
    const url = "https://kobis.or.kr/kobisopenapi/webservice/rest/movie/searchMovieList.json?key=f5eef3421c602c6cb7ea224104795888&directorNm=" + searchApiGenre.value;
    let apiData = null;
    
    fetch(url)
    .then(data => { return data.json(); })
    .then(function(msg){
        // const idspan = document.getElementById('api');
        // const liNode = document.createElement("li");
        console.log(msg);
        // const data1 = apiData
        console.log(msg.movieListResult.movieList);
        // // for (i = 0; i < data1.boxOfficeResult.dailyBoxOfficeList.length; i++) {
        //     //     liNode.textContent = `${data1.boxOfficeResult.dailyBoxOfficeList.i["movieNm"]}`;
        //     //     idspan.appendChild(liNode);
        //     // } 
        // })
        // var item_int = 5
        var title = document.getElementById('a')
        title.innerHTML = "";
        for(var i =0; i<msg.movieListResult.movieList.length; i++){
            var div = document.createElement('div');
            var low_div = document.createElement('div')
            var title_div = document.createElement('div')
            var br = document.createElement('br');
            var short_url = msg.movieListResult.movieList[i];
            var mp = document.createElement('h3');
            mp.id = 'movieNm'
            var np = document.createElement('p');
            np.id = 'nationAlt'
            var gp = document.createElement('p');
            gp.id = 'genreAlt'
            var pp = document.createElement('p');
            pp.id = 'prdtYear'
            let aa = document.createElement('a');
            aa.id = 'alink'
            aa.setAttribute('href', `/api/movieInfo?movieCd=${short_url.movieCd}`)
            title_div.id = 'title_div'
            low_div.id = 'low_div'
            div.id = 'movies'

            console.log(short_url);
            div.appendChild(title_div)
            div.appendChild(low_div)
            aa.appendChild(div);
            title.appendChild(aa);
            var movieNm = document.createTextNode('제목 : '+short_url.movieNm);
            var nationAlt = document.createTextNode('국가 : '+short_url.nationAlt);
            var genreAlt = document.createTextNode('장르 : '+short_url.genreAlt);
            var prdtYear = document.createTextNode('제작 : '+short_url.prdtYear);
            
            mp.appendChild(movieNm);
            np.appendChild(nationAlt);
            gp.appendChild(genreAlt);
            pp.appendChild(prdtYear);

            title_div.appendChild(mp);
            low_div.appendChild(np);
            low_div.appendChild(gp);
            low_div.appendChild(pp);
            low_div.appendChild(br);
        }})
    }
}



const startYear = document.getElementById('startYear');
const endYear = document.getElementById('endYear');
function movieYearSearch(){
    console.log(startYear.value);
    console.log(endYear.value);
    if(startYear.value.length !== 0 && endYear.value.length !== 0 /* && (startYear.value !== endYear.value) */ && startYear.value <= endYear.value){
    const url = "https://kobis.or.kr/kobisopenapi/webservice/rest/movie/searchMovieList.json?key=f5eef3421c602c6cb7ea224104795888&itemPerPage=100&openStartDt=" + startYear.value; + "&openEndDt=" + endYear;
    let apiData = null;
    
    fetch(url)
    .then(data => { return data.json(); })
    .then(function(msg){
        // const idspan = document.getElementById('api');
        // const liNode = document.createElement("li");
        console.log(msg);
        // const data1 = apiData
        console.log(msg.movieListResult.movieList);
        // // for (i = 0; i < data1.boxOfficeResult.dailyBoxOfficeList.length; i++) {
        //     //     liNode.textContent = `${data1.boxOfficeResult.dailyBoxOfficeList.i["movieNm"]}`;
        //     //     idspan.appendChild(liNode);
        //     // } 
        // })
        // var item_int = 5
        var title = document.getElementById('a')
        title.innerHTML = "";
        for(var i =0; i<msg.movieListResult.movieList.length; i++){
            var div = document.createElement('div');
            var low_div = document.createElement('div')
            var title_div = document.createElement('div')
            var br = document.createElement('br');
            
            var short_url = msg.movieListResult.movieList[i];
            var mp = document.createElement('h3');
            mp.id = 'movieNm'
            var np = document.createElement('p');
            np.id = 'nationAlt'
            var gp = document.createElement('p');
            gp.id = 'genreAlt'
            var pp = document.createElement('p');
            pp.id = 'prdtYear'
            let aa = document.createElement('a');
            aa.id = 'alink'
            aa.setAttribute('href', `/api/movieInfo?movieCd=${short_url.movieCd}`)
            title_div.id = 'title_div'
            low_div.id = 'low_div'
            div.id = 'movies'
            console.log(short_url);
            div.appendChild(title_div)
            div.appendChild(low_div)
            aa.appendChild(div);
            title.appendChild(aa);
            var movieNm = document.createTextNode('제목 : '+short_url.movieNm);
            var nationAlt = document.createTextNode('국가 : '+short_url.nationAlt);
            var genreAlt = document.createTextNode('장르 : '+short_url.genreAlt);
            var prdtYear = document.createTextNode('개봉 일 : '+short_url.openDt);
            
            mp.appendChild(movieNm);
            np.appendChild(nationAlt);
            gp.appendChild(genreAlt);
            pp.appendChild(prdtYear);

            title_div.appendChild(mp);
            low_div.appendChild(np);
            low_div.appendChild(gp);
            low_div.appendChild(pp);
            low_div.appendChild(br);
        }})
    } else {
        alert('다시 검색해주세요.');
    }
}

let date = new Date();
const todYear = date.getFullYear();
let sotMonth = date.getMonth();
let todMonth = "";
    if( sotMonth < 10 ){
        todMonth = ('00' + sotMonth+1).slice(-2);
    }else{
        todMonth = sotMonth+1;
    }
const todDate = date.getDate()-1;

function boxOfficeMovie(){
    console.log(todDate);
    console.log(todYear);
    console.log(todMonth);
    const url = "http://kobis.or.kr/kobisopenapi/webservice/rest/boxoffice/searchDailyBoxOfficeList.json?key=f5eef3421c602c6cb7ea224104795888&targetDt=" + todYear + todMonth + todDate;
    let apiData = null;
    
    fetch(url)
    .then(data => { return data.json(); })
    .then(function(msg){
        // const idspan = document.getElementById('api');
        // const liNode = document.createElement("li");
        console.log(msg);
        // const data1 = apiData
        console.log(msg.boxOfficeResult.dailyBoxOfficeList);
        // // for (i = 0; i < data1.boxOfficeResult.dailyBoxOfficeList.length; i++) {
        //     //     liNode.textContent = `${data1.boxOfficeResult.dailyBoxOfficeList.i["movieNm"]}`;
        //     //     idspan.appendChild(liNode);
        //     // } 
        // })
        // var item_int = 5
        var title = document.getElementById('b')
        title.innerHTML = "";
        for(var i =0; i<msg.boxOfficeResult.dailyBoxOfficeList.length; i++){
            var div = document.createElement('div');
            var low_div = document.createElement('div')
            var title_div = document.createElement('div')
            var br = document.createElement('br');
            var short_url = msg.boxOfficeResult.dailyBoxOfficeList[i];

            var mp = document.createElement('h3');
            mp.id = 'movieNm'
            var np = document.createElement('p');
            np.id = 'nationAlt'
            var gp = document.createElement('p');
            gp.id = 'genreAlt'
            var pp = document.createElement('p');
            pp.id = 'prdtYear'
            let aa = document.createElement('a');
            aa.id = 'alink'
            aa.setAttribute('href', `/api/movieInfo?movieCd=${short_url.movieCd}`)
            title_div.id = 'title_div'
            low_div.id = 'low_div'
            div.id = 'movies'
            div.className = 'col'
            console.log(short_url);
            div.appendChild(title_div)
            div.appendChild(low_div)
            aa.appendChild(div);
            title.appendChild(aa);
            var movieNm = document.createTextNode('순위 : '+short_url.rank);
            var nationAlt = document.createTextNode('제목 : '+short_url.movieNm);
            var genreAlt = document.createTextNode('개봉 일 : '+short_url.openDt);
            var prdtYear = document.createTextNode('누적관객수 : '+short_url.audiAcc.replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ","));
            
            mp.appendChild(movieNm);
            np.appendChild(nationAlt);
            gp.appendChild(genreAlt);
            pp.appendChild(prdtYear);

            title_div.appendChild(mp);
            low_div.appendChild(np);
            low_div.appendChild(gp);
            low_div.appendChild(pp);
            low_div.appendChild(br);
        }
    })
}

// window.onload = (() => {
//     boxOfficeMovie();
// });


function boxOfficeMovieWeek(){
    console.log(todDate);
    console.log(todYear);
    console.log(todMonth);
    const url = "http://kobis.or.kr/kobisopenapi/webservice/rest/boxoffice/searchWeeklyBoxOfficeList.json?key=f5eef3421c602c6cb7ea224104795888&targetDt=" + todYear + todMonth + todDate +"&weekGb=0";
    let apiData = null;
    
    fetch(url)
    .then(data => { return data.json(); })
    .then(function(msg){
        // const idspan = document.getElementById('api');
        // const liNode = document.createElement("li");
        console.log(msg);
        // const data1 = apiData
        console.log(msg.boxOfficeResult.weeklyBoxOfficeList);
        // // for (i = 0; i < data1.boxOfficeResult.dailyBoxOfficeList.length; i++) {
        //     //     liNode.textContent = `${data1.boxOfficeResult.dailyBoxOfficeList.i["movieNm"]}`;
        //     //     idspan.appendChild(liNode);
        //     // } 
        // })
        // var item_int = 5
        var title = document.getElementById('c')
        title.innerHTML = "";
        for(var i =0; i<msg.boxOfficeResult.weeklyBoxOfficeList.length; i++){
            var div = document.createElement('div');
            var low_div = document.createElement('div')
            var title_div = document.createElement('div')
            var br = document.createElement('br');
            var short_url = msg.boxOfficeResult.weeklyBoxOfficeList[i];
            var mp = document.createElement('h3');
            mp.id = 'movieNm'
            var np = document.createElement('p');
            np.id = 'nationAlt'
            var gp = document.createElement('p');
            gp.id = 'genreAlt'
            var pp = document.createElement('p');
            pp.id = 'prdtYear'
            let aa = document.createElement('a');
            aa.id = 'alink'
            aa.setAttribute('href', `/api/movieInfo?movieCd=${short_url.movieCd}`)
            title_div.id = 'title_div'
            low_div.id = 'low_div'
            div.id = 'movies'
            div.className = 'col'

            console.log(short_url);
            div.appendChild(title_div)
            div.appendChild(low_div)
            aa.appendChild(div);
            title.appendChild(aa);
            var movieNm = document.createTextNode('순위 : '+short_url.rank);
            var nationAlt = document.createTextNode('제목 : '+short_url.movieNm);
            var genreAlt = document.createTextNode('개봉 일 : '+short_url.openDt);
            var prdtYear = document.createTextNode('누적관객수 : '+short_url.audiAcc.replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ","));
            
            mp.appendChild(movieNm);
            np.appendChild(nationAlt);
            gp.appendChild(genreAlt);
            pp.appendChild(prdtYear);

            title_div.appendChild(mp);
            low_div.appendChild(np);
            low_div.appendChild(gp);
            low_div.appendChild(pp);
            low_div.appendChild(br);
        }
    })
}

