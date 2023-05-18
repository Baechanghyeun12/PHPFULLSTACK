

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

function movieSearch(){
    const id = document.getElementById('searchApi');
    const url = "	http://kobis.or.kr/kobisopenapi/webservice/rest/boxoffice/searchDailyBoxOfficeList.json?key=95e209d53cec7f7cda80f22def5230b3&targetDt=" + id.value;
    let apiData = null;

    fetch(url)
    .then(data => { return data.json(); })
    .then(apiData =>{
        const idspan = document.getElementById('api');
        const liNode = document.createElement("li");
        console.log(apiData);
        for (i = 0; i < apiData.boxOfficeResult.dailyBoxOfficeList.length; i++) {
            liNode.textContent = `${apiData.boxOfficeResult.dailyBoxOfficeList.i.movieNm}`;
            idspan.appendChild(liNode);
        } 
    })
}
// boxOfficeResult
// boxofficeType
// dailyBoxOfficeList