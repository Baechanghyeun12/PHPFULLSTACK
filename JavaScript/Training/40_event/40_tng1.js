// 1. 버튼을 클릭시 아래 내용의 할러트가 나옵니다.
        //안녕하세요.
        //숨어있는 div를 찾아보세요.

// 2. 특정 영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다.
        //"두근두근"

// 3. 2번의 영역을 클릭하면 배경색이 베이지 색으로 바뀌어 나타납니다.
// 들켰다!

// 4. 3번의 상태에서 다시 한번더 클릭하면 아래의 알러트를 출력하고, 배경색이 흰색으로 바뀌어 안보이게 됩니다.
//"다시 숨는다."
function click_div1() {
    const rand = Math.ceil(Math.random()*100)
    const hasClass = div1.classList.contains("clicked");
    
        if(hasClass) {
        div1.classList.remove("clicked");
        alert('다시 숨는다.')
        div1.style.top = rand + "%";
        div1.style.left = rand + "%";
    } else {
        div1.classList.add("clicked");
        alert('들켰다!')
    }
}
function alert1(){
    const hasClass = div1.classList.contains("clicked");
    if(!hasClass) {
        alert('두근두근')
    }
}

const btn = document.querySelector('.btn');
btn.addEventListener('click', () => alert('안녕하세요.\n숨어있는 div를 찾아보세요.'))
const div1 = document.querySelector('.div1');
div1.addEventListener('click', click_div1 );
div1.addEventListener('mouseenter', alert1)

