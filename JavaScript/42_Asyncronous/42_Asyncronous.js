
// console.log('A');
// console.log('B');
// console.log('C');
// console.log('D');


// 비동기 처리 방식(타이머 함수들, http요청, 이벤트)

// console.log('A');
// setTimeout(() => {
//     console.log('B');
// }, 1000);
// console.log('c');

// const a =2;
// const b = 3;
// const sum = function() {

//     setTimeout(() => {
//         return a + b;
//     }, 1000);
// }
// console.log(sum());

// 비동기 처리에서의 콜백 지옥

// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('b');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000);
//     }, 2000);

// }, 3000);


// 로그인 콜백 지옥 체험
const Login = {
    chkinput(id, pw, success, error){
        setTimeout(() => {
            if(id !== '' && pw !== ''){
                success({chkid: id, chkpw: pw});
            } else{
                error(new Error('잘못 입력 하셨습니다.'));
            }
        }, 500);
    }
    , loginUser(id, pw, success, error){
        setTimeout(() => {
            if(id === 'php506' && pw === '506'){
                success(id);
            } else{
                error(new Error('없는 유저입니다.'));
            }
        }, 500);
    }
    , chkAuth(id, success, error){
        setTimeout(() => {
            if(id === 'php506'){
                success({authId: id, auth:'admin'});
            } else{
                error(new Error('권한이 없습니다.'));
            }
        }, 500);
    }
}

const id = 'php506';
const pw = '506';

Login.chkinput(
    id
    ,pw
    ,chkData => {
        Login.loginUser(
            chkData.chkid
            ,chkData.chkpw
            ,loginId => {Login.chkAuth(
                loginId
                ,authData => {console.log(`${authData.authId}유저님, 권한은${authData.auth}입니다.`);}
                ,authError => {console.log(authError.message);}
                )}
            ,loginError => {console.log(loginError.message);}
        )
    }
    ,chkError => {console.log(chkError.message);}
);

// function myCallBack(i){
//     return i + 1;
// }

// function printNum(fn){
//     console.log(fn(4));
// }

// printNum(myCallBack);




