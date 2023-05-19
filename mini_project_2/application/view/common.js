

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
    const url = "https://kobis.or.kr/kobisopenapi/webservice/rest/movie/searchMovieList.json?key=f5eef3421c602c6cb7ea224104795888&movieNm=" + id.value +"&itemPerPage=10";
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
        var item_int = 5
        var title = document.getElementById('a')
        title.innerHTML = "";
        for(var i =0; i<item_int; i++){
            var div = document.createElement('div');
            var low_div = document.createElement('div')
            var title_div = document.createElement('div')
            var br = document.createElement('br');

            var mp = document.createElement('p');
            mp.id = 'movieNm'
            var np = document.createElement('p');
            np.id = 'nationAlt'
            var gp = document.createElement('p');
            gp.id = 'genreAlt'
            var pp = document.createElement('p');
            pp.id = 'prdtYear'
            title_div.id = 'title_div'
            low_div.id = 'low_div'
            div.id = 'movies'
            var short_url = msg.movieListResult.movieList[i];
            console.log(short_url);
            div.appendChild(title_div)
            div.appendChild(low_div)
            title.appendChild(div);
            var movieNm = document.createTextNode(short_url.movieNm);
            var nationAlt = document.createTextNode(short_url.nationAlt);
            var genreAlt = document.createTextNode(short_url.genreAlt);
            var prdtYear = document.createTextNode(short_url.prdtYear);
            
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