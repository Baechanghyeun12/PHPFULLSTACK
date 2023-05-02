// 콘솔에 찍는 방법 console.log("  ");
// console.log("안녕하세요. js파일입니다.", "두번째");





// //-------------------------------------
// //                 변수
// //-------------------------------------

// // var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
// var u_name = "홍길동";  /* JavaScript가 옛날에 사용하던 방식 */
// var u_name = "갑순이";  /* 중복 선언 가능 */
// u_name = "갑돌이";      /* 재할당 가능 */

// console.log(u_name);

// // 상수     * 상수는 재할당이 되지 않는다 *

// // let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
// let u_age = 20;        /* JavaScript가 현재 사용하는 방식 */
// // let u_age = 30;    중복 선언 불가능
// u_age = 30;            /* 재할당은 가능하다 */


// const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프
// const gender = "남자";
// gender = "여자";


// -------------------------------
//              스코프
// -------------------------------

// 전역 스코프 * 어디서든지 접근(사용)할 수 있는 스코프(변수) *
let u_name = "홍길동";

// 함수 레벨 스코프  * 함수 내에서만 접근할 수 있는 변수들 *
function test(){
    console.log(u_name);
    let u_age = 30;
    console.log(u_age);
}

// 블록 레벨 스코프     중괄호 안에서 선언된것을 블록레벨 스코프라고 한다. 중괄호 밖에서 사용하려고하면 사용하지 못한다.
function test1(){
    let v_test1 = "함수 : 테스트1";
    if (true) {
        var v_var1 = "var로 선언";
    }
    console.log(v_test1);
    console.log(v_var1);
}


//-----------------------------------
//              호이스팅( hoisting )
//-----------------------------------
// 인터프리터가 변수화 함수의 메모리 공간을 선언 전에 미리 할당 한느 것
// (인터프리터 : 프로그래밍 언어의 소스 코드를 바로 실행하는 컴퓨터 프로그램 또는 환경)
// 코드가 실행되기 전에 변수와 함수를 최상단에 끌어 올려지는 것
// console.log(hTest());
// console.log("51 line : " + varTest);
console.log("65 line : " + constTest);

function hTest() {
    return "함수 : hTest";
}

var varTest = "var : var변수";
// console.log("58 line : " + varTest);

let letTest = "let 변수";
const constTest = "const 상수";