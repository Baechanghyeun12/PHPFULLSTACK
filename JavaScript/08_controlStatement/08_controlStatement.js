// 제어문

//--------------------------
// 조건문( if, switch)
//--------------------------
if( 1 > 0 ) {
    console.log("1은 0보다 크다.")
} else if(1 < 0) {
    console.log("1은 0보다 작다.")
} else {
    console.log("기타 등등")
}

let u_age = 30;
switch ( u_age ) {
    case 20:
        console.log("20살");
        break;
    case 10:
        console.log("10살");
        break;
    default:
        console.log(u_age + "살");
        break;
}


//-------------------------------------------------------
// 반복문 ( while, do_while, for, foreach, for...in, for...of )
//-------------------------------------------------------
// let num = 0;
// while( num <= 3 ) {
//     console.log(num);
//     num++;
// }

// let dan = 2;
// let multi = 1;
// do {
//     console.log(dan + " 단 " + multi + " = " + dan * multi);
//     multi++;
// } while (multi <= 9);


// let dan = 2;
// for( let i = 1; i <= 9; i++ ) {
//     console.log(dan + " 단 " + i + " = " + dan * i);
// }


// foreach : 배열만 루프 가능
// let arr = [1, 2, 3, 4];
// arr.forEach( function( val ) {
//     console.log( val );
// }
// );

// for...in : 모든 객체를 루프 가능
// arr = {
//     u_name: "홍길동"
//     ,u_age: 0
// };
// for( let i in arr) {
//     console.log( i + " : " + arr[i] );
// }

// for...of : 
// 인덱스 배열만 가지고와서 출력할 수 있다.
// arr = {
//     u_name: "홍길동"
//     ,u_age: 0
// };
let arr = [5, 4, 3];
arr.num =2;
for( let i of arr) {
    console.log( i );
}
