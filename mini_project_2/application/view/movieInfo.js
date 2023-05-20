const urlParams = new URL(location.href).searchParams;
const movieCd = urlParams.get('movieCd');


function movieCdSearch(){
    if(movieCd !==null){
    const url = "http://www.kobis.or.kr/kobisopenapi/webservice/rest/movie/searchMovieInfo.json?key=f5eef3421c602c6cb7ea224104795888&movieCd=" + movieCd;
    let apiData = null;
    
    fetch(url)
    .then(data => { return data.json(); })
    .then(function(msg){
        // const idspan = document.getElementById('api');
        // const liNode = document.createElement("li");
        console.log(msg);
        // const data1 = apiData
        console.log(msg.movieInfoResult.movieInfo);
        // // for (i = 0; i < data1.boxOfficeResult.dailyBoxOfficeList.length; i++) {
        //     //     liNode.textContent = `${data1.boxOfficeResult.dailyBoxOfficeList.i["movieNm"]}`;
        //     //     idspan.appendChild(liNode);
        //     // } 
        // })
        // var item_int = 5
        var title = document.getElementById('a')
        title.innerHTML = "";
            var div = document.createElement('div');
            var low_div = document.createElement('div')
            var title_div = document.createElement('div')
            var br = document.createElement('br');
            var actors_div = document.createElement('div')
            title_div.id = 'title_div'
            low_div.id = 'low_div'
            div.id = 'movies'
            actors_div = 'actors'

            var mp = document.createElement('h3');
            mp.id = 'movieNm'
            var np = document.createElement('p');
            np.id = 'nationAlt'
            var gp = document.createElement('p');
            gp.id = 'genreAlt'
            var pp = document.createElement('p');
            pp.id = 'prdtYear'
            var ap = document.createElement('p');
            ap.id = 'prdtYear'
            var bp = document.createElement('p');
            bp.id = 'prdtYear'
            var cp = document.createElement('p');
            cp.id = 'actors'

            var short_url = msg.movieInfoResult.movieInfo;
            
            console.log(short_url);
            div.appendChild(title_div)
            div.appendChild(low_div)
            title.appendChild(div);
        console.log(short_url.actors[0]);
            var movieNm = document.createTextNode('제목 : '+short_url.movieNm);
            var nationAlt = document.createTextNode('국가 : '+short_url.nations[0].nationNm);
            var genreAlt = document.createTextNode('장르 : '+short_url.genres[0].genreNm);
            var prdtYear = document.createTextNode('개봉 : '+short_url.openDt);

            var prdtYear1 = document.createTextNode('상영 시간(분) : '+short_url.showTm);
            var prdtYear2 = document.createTextNode('유형 : '+short_url.typeNm);
            // var prdtYear = document.createTextNode('개봉 : '+short_url.prdtYear);
            // var prdtYear = document.createTextNode('개봉 : '+short_url.prdtYear);
            // var prdtYear = document.createTextNode('개봉 : '+short_url.prdtYear);
            // var prdtYear = document.createTextNode('개봉 : '+short_url.prdtYear);
            // var prdtYear = document.createTextNode('개봉 : '+short_url.prdtYear);
            // var prdtYear = document.createTextNode('개봉 : '+short_url.prdtYear);
            // var prdtYear = document.createTextNode('개봉 : '+short_url.prdtYear);
            // var prdtYear = document.createTextNode('개봉 : '+short_url.prdtYear);
            // var prdtYear = document.createTextNode('개봉 : '+short_url.prdtYear);
            // var prdtYear = document.createTextNode('개봉 : '+short_url.prdtYear);
            // var prdtYear = document.createTextNode('개봉 : '+short_url.prdtYear);
            
            
            mp.appendChild(movieNm);
            np.appendChild(nationAlt);
            gp.appendChild(genreAlt);
            pp.appendChild(prdtYear);
            ap.appendChild(prdtYear1);
            bp.appendChild(prdtYear2);
            
            title_div.appendChild(mp);
            low_div.appendChild(np);
            low_div.appendChild(gp);
            low_div.appendChild(pp);
            low_div.appendChild(ap);
            low_div.appendChild(bp);
            if(short_url.actors !== null){
                for(let i =0; i <= short_url.actors.length-1;i++){
                    var actorName = short_url.actors[i];
                    var prdtYe = document.createTextNode(actorName.peopleNm);
                    cp.appendChild(prdtYe);
                    low_div.appendChild(cp);
                    low_div.appendChild(br);
                }
            }
            
    })
    }
}
