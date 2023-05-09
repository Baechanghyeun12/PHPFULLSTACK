


const promise1 = new Promise((resolve,reject) => {
    const data = true;
    if(data) {
        resolve('성공');
    } else{
        reject('error');
    }
});

promise1
.then(data => {console.log(data);}) // 성공적으로 수행했을 때 실행되는 코드
.catch(error => {console.log(error);}) // 실패했을 때 실행되는 코드
.finally(() => {console.log('파이널리');});// 성고하든 실패하든 무조건 실행된느 코드


// 함수 등록해서 promise사용
function myPromise() {
    return new Promise((resolve, reject) =>{
        const data = true;

        if(data) {
            resolve('성공');
        } else{
            reject('error');
        }
});
}

    myPromise()
    .then(data => {console.log(data);}) // 성공적으로 수행했을 때 실행되는 코드
    .catch(error => {console.log(error);}) // 실패했을 때 실행되는 코드
    .finally(() => {console.log('파이널리');});// 성고하든 실패하든 무조건 실행된느 코드




// 로그인 콜백 지옥이었던 것을 promise로 구현
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