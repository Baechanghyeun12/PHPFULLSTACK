// 타이머 함수

// 1. setTimeout() / clearTimeout()
const timeOut = setTimeout(() => console.log('A'), 2000);   // 타이머 셋팅
clearTimeout(timeOut);  // 타이머 제거

// 2. setInterval() / clearInterval()
// const myInterval=setInterval(() => console.log('A'), 1000); // 인터벌 셋팅
// let myInterval1=setInterval(() => add1(i++), 1000);  // 인터벌 제거


// 1~5를 1초마다 콘솔에 출력해 주세요.
// let num = 5;
// let i = 1;
// let myInterval1=setInterval(() => add1(i++), 1000);

// function add1(num){
//     if(num >=5){
//         clearInterval(myInterval1);
//     }
//     console.log(num);
// }

let i = 1;
const interval1 = setInterval(() => {
    console.log(i);
    if(i++ === 5){
        clearInterval(interval1);
    }

}, 1000);