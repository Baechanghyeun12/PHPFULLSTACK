
// let time =now.toTimeString();
// let time1 = document.write("<p>현재 시각 "+time+"</p>");

// setInterval(time1, 1000);


function clock(){
    const now = new Date();
    let sclock = document.getElementsByClassName('sclock');

    let show = "현재 시간 : ";
    show += now.getHours() + " : ";
    show += now.getMinutes() + " : ";
    show += now.getSeconds() ;

    sclock[0].innerText = show;
}

// function clock2() {
//     const hasClass = btn[0].classList.contains("stop");
    
//         if(hasClass) {
//         btn[0].classList.remove("stop");
//         btn[0] = document.getElementsByClassName('btn');
//     } else {
//         btn[0].classList.add("stop");
//         clearInterval(clock1)
//     }
// }
let clock1 = setInterval(clock, 1000);
const btn = document.getElementsByClassName('btn');
const btn1 = document.getElementsByClassName('btn1');


btn[0].addEventListener('click',function(){
    clearInterval(clock1);
});
btn1[0].addEventListener('click', function(){
    clock1= setInterval(clock, 1000); ;
})