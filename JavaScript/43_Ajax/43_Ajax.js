// https://picsum.photos/

// const url ="https://picsum.photos/v2/list?page=7&limit=5";
// const body = document.body;
// fetch(url)
// .then(res => {return res.json()})
// .then(data => makeList(data))
// .catch(console.log);
const btn = document.getElementById('bbb')


function makeList(data) {
    data.forEach(item => {
        const tagImg = document.createElement('img');
        tagImg.setAttribute('src',item.download_url);
        tagImg.classList.add('img1')
        document.getElementById('div1').appendChild(tagImg);
    });
}

//1. css 파일 따로 "api실행"버튼을 누르면 그림이 나오게 다시 누르면 처음부터 다시 나오게
// 2. input에 URL을 적고 버튼을 누를시 해당 URL의 이미지가 나오게 

btn.addEventListener('click', ()=> {
    const itp = document.getElementById('url').value
    if(itp === ""){
        alert("URL을 입력해 주세요.")
    }
    else if(document.getElementById('div1') !== ""){
        document.getElementById('div1').innerHTML="";
        fetch(itp)
        .then(res => {return res.json()})
        .then(data => makeList(data))
        .catch(()=> alert('잘못된 URL을 입력했습니다.'))
    }
    // else{
    // fetch(itp)
    // .then(res => {return res.json()})
    // .then(data => makeList(data))
    // .catch(console.log);
    // }
});