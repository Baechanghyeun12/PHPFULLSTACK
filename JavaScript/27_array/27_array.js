let arr = [ 1, 2, 3, 4, 5 ];

// push() : 메소드를 이용해서 배열에 값 추가
arr.push(6);

// delete : 배열의 값 삭제(인덱스는 남아 있다.)
//delete로 배열을 지우면 방은 남아 있고 값만 지워진다.(배열의 길이는 그대로 유지된다.)
// delete arr[5];

// splice(삭제하고싶은 방번호,몇개를 삭제할것인가,추가하고싶은 값) 메소드 : 배열의 요소를 삭제 또는 교체
arr = [1, 2, 3, 4, 5];
arr.splice(2, 1); // 배열에서 arr[2]가 삭제
arr.splice(2, 0, 3); // 배열에서 arr[2]에 값 3인 인덱스를 추가
arr.splice(2, 1, 3); // 배열에서 arr[2]의 값을 3으로 변경(삭제 후 추가)
arr.splice(2, 1, 3, 5, 6, 7); // 3번째 매개변수부터는 가변파라미터로 모든 값을 추가
// arr.length는 배열의 길이를 구하는 함수


// indexof() 메소드 : 배열에서 특정 요소를 찾는데 사용(인덱스 값을 알려줌 없으면 -1값이 돌아온다.)
// let arr2 = [ 1, 2, 3, 4, 5 ];
// arr2.indexOf(3);

// lastIndexof() 메소드 : 배열에서 가장 마지막 위치의 특정 요소를 찾는데 사용
// arr2 = [ 1, 2, 3, 4, 3, 5, 6, 6, 1 ];
// arr2.lastIndexOf(6);

// 예제
// let fileName = 'javaScript.log.php'
// fileName = 'ttt.aa.bbb'
// let arr5 = [];
// 아래처럼 콘솔에 출력해 주세요. ( indexof(), lasIndexof(), slice()메소드를 이용 )
// javaScript
// log
// php
// fileName.slice(0,10);
// fileName.slice(11,14);
// fileName.slice(15,18);
// arr5.push(fileName.slice(fileName.indexOf(fileName.slice(0,fileName.lastIndexOf('t')+1)),fileName.indexOf(fileName.slice(11,fileName.lastIndexOf('g')))-1));
// arr5.push(fileName.slice(fileName.indexOf(fileName.slice(11,fileName.lastIndexOf('g'))),14));
// arr5.push(fileName.slice(15,18));
// arr5.indexOf(fileName.slice(0,fileName.lastIndexOf('t')+1))
// arr5.indexOf(fileName.slice(11,fileName.lastIndexOf('g')+1))
// arr5.indexOf(fileName.slice(15,fileName.lastIndexOf('p')+1))
// fileName.lastindexOf('.');
// fileName.lastIndexOf('.');
// fileName.slice(0,fileName.indexOf('.'));
// fileName.slice(fileName.indexOf('.')+1,fileName.lastIndexOf('.'));
// fileName.slice(fileName.lastIndexOf('.')+1);


// concat() 메소드 : 배열들의 값을 기존 배열에 합쳐서 새 배열을 반환
let arrCon1 = [1, 2, 3];
let arrCon2 = [10, 20, 30];
let arrCon4 = [100, 200, 300];
let arrCon3 = arrCon1.concat(arrCon2,arrCon4);
console.log(arrCon3);


// includes() 메소드 : 배열이 특정요소를 가지고 있는지 판별, return true/flase
let arrInc = [1, 2, 3, 4];
console.log( arrInc.includes( 7 ) );



// sort() 메소드 : 배열의 요소를 아스키코드 기준으로 정렬해서 반환
const arrSort = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];
arrSort.sort(); //[100, 3, 3, 40, 5, 5, 6, 7, 8, 80, 92]

arrSort.sort((a,b) => a-b);     // 오름차순 정렬

arrSort.sort(                   // 오름차순 정렬
    function( a, b ){
        return a - b;
    }
);

arrSort.sort((a,b) => b-a);     // 내림차순 정렬

arrSort.sort(                   // 내림차순 정렬
    function( a, b ){
        return b - a;
    }
);


// join() 메소드 : 배열의 모든 요소를 연결해서 하나의 문자열 만들어 줍니다.
const arrJoin = ["안녕", "하세","요"];
arrJoin.join();     //'안녕,하세,요'
arrJoin.join('');   //'안녕하세요'
arrJoin.join('/');  //'안녕/하세/요'


// every() 메소드 : 배열의 모든 요소들이 주어진 함수를 통과하는 지 판별(다 통과하면 true, 하나라도 통과하지 못하면 false)
const arrEvery = [1, 2, 3, 4, 5];
let result = arrEvery.every( function( val ){
                            return val <= 5;
                        });
console.log(result);


// 모든 요소의 2로 나눈 나머지가 0인지 판별해주세요.
let result1 = arrEvery.every( function( val ){
    return val%2 === 0;
});
console.log(result1);
// const arrEvery2 = [1, 2, 3, 4, 5];
// let result2 = arrEvery2.every((val) => val%2 === 0);
// console.log(result2);



// some() 메소드 : 배열 안에 어떤 요소라도 주어진 함수를 통과하는 지 판별(하나라도 통과하면 true, 전부 통과하지 못할경우 false)
const arrSome = [1, 2, 3, 4, 5];
let result2 = arrSome.some( val => val >= 5 );
console.log(result2);



// filter() 메소드 : 주어진 함수를 통과하는 모든 요소를 모아서 새로운 배열로 반환
const arrFilter = [1, 2, 3, 4, 5];
let result3 = arrFilter.filter( val => val >= 3 );
console.log(result3);
