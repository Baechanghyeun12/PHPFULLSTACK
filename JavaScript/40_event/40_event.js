// 인라인 이벤트 등록
// html파일의 11행, 13행 참조
// onclick

// 프로퍼티 리스너
// document.getElementById('btn1');
const btn1 = document.querySelector('#btn1');
btn1.onclick = function(){
    location.href = "http://www.google.com"
}

// addEventlistener(eventType, function) 방식
const btn2 = document.querySelector('#btn2');

// 현재창에서 열기
// btn2.addEventListener( 'click', () => {
//     location.href = 'http://www.daum.net';
// });


// 팝업 창 열기
let newwindow = null;
btn2.addEventListener( 'click', () => {
    newwindow = open( 'http://www.daum.net', 'test', 'width=500 height=500');
});


// 팝업창 닫기
const btn3 = document.getElementById('btn3');
// btn3.addEventListener('click', popUpClose(newwindow));


// 이벤트 삭제
// removeEventListener(eventType, function)
// addEventListener()로 등록한 이벤트의 아규먼트와 같은 아규먼트를 셋팅해야 삭제됩니다.
// btn3.removeEventListener('click', popUpClose(newwindow));

// function popUpClose(win) {
//     win.close();
// }


// 이벤트 타입
// 중복 되지 않는 이벤트를 여러가지 넣을 수 있다.
// - mousedown - 마우스가 요소안에서 클릭이 눌릴 때
const div1 = document.querySelector('.div1');
div1.addEventListener('mousedown', () => alert('div1 클릭') );
// - mouseenter - 마우스가 요소 안으로 진입 했을 때
div1.addEventListener('mouseenter', () => alert('div1 진입') );