let num = 100;
let arrNum = [];
// 1. 1~입력값의 요소를 가지는 배열을 만들어주세요.
for (let i = 1; i <= num; i++) {
    arrNum.push(i);
}
// 2. 그 배열에서 소수만 찾아서 새로운 배열을 만들어 주세요.
// let result = arrNum.filter( val => val%2 !== 0 && val%3 !== 0 && val%5 !== 0 && val%7 !== 0);
// 3. 그 배열을 알러트로 출력해 주세요.
// let result = arrNum.filter( function(val) {
//     for (let i = val; i <= arrNum.length; i++) {
//         if(val === 1){return false;}
//         else if(val === 2){return true;}
//         else if(val === 3) {return true;}
//         else if(val <= 10 && val > 2 && val%2 !==0 && val%3 !== 0){
//             return true;
//         }
//         else if(val%2 !== 0 && val%3 !== 0 && val%5 !== 0 && val%7 !== 0){
//             return true;
//         }
//     }
// }
// );
// alert(result);

let result = arrNum.filter(function(num) {
    if(num < 2) {return false;}
    for (let i = 2; i * i <= num; i++) {
        if(num % i === 0) {
            return false;
        }
    }
    return true
}
);