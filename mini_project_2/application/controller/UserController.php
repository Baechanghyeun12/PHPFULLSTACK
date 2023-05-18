<?php
namespace application\controller;

class UserController extends Controller {
    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    public function loginPost() {
        $result =$this->model->getUser($_POST);
        $this->model->closeConn();
        if(count($result) === 0){
            $errMsg = "입력하신 회원 정보가 없습니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "login"._EXTENSION_PHP;
        }
        // session에 User ID 저장
        $_SESSION[_STR_LOGIN_ID] = $_POST["u_id"];

        
        // 리스트 페이지 리턴
        return _BASE_REDIRECT."/movie/main";
    }

    // 로그아웃 메소드
    public function logoutGet(){
        session_unset();
        session_destroy();
        return "main"._EXTENSION_PHP;
    }

    public function signUpGet(){
        return "signup"._EXTENSION_PHP;
    }
    
    public function signUpPost(){
        $arrPost = $_POST;
        $arrChkErr = [];
        $pw = $arrPost["u_pw"];
        $patten = "/[^a-zA-Z0-9]/";
        $num = preg_match('/[0-9]/u', $pw);
        $eng = preg_match('/[a-z]/u', $pw);
        $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);
        $tel = preg_match('/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}/u',$_POST["u_tel"]);
        // $email = preg_match('/^[a-zA-Z0-9]{1}[a-zA-Z0-9\-_]+@[a-z0-9]{1}[a-z0-9\-]+[a-z0-9]{1}\.(([a-z]{1}[a-z.]+[a-z]{1}[a-z]+)|([a-z]+))/u',$_POST["u_email"]);

        // 유효성체크(영문자랑 숫자도 체크해야된다.)
        // ID 글자수 체크
        if(mb_strlen($arrPost["u_id"]) > 12 || mb_strlen($arrPost["u_id"]) === 0){
            $arrChkErr["u_id"] = "ID는 12글자 이하로 입력해 주세요.";
        }
        // ID 영문숫자 체크 (이거는 한번 해보세요.)
        if(preg_match($patten, $arrPost["u_id"]) !==0){
            $arrChkErr["u_id"] = "ID는 영어 대문자, 영어 소문자, 숫자로만 입력해 주세요.";
            $arrPost["u_id"] = "";
        }
        
        // PW 글자수 체크
        if(mb_strlen($arrPost["u_pw"]) < 8 || mb_strlen($arrPost["u_pw"]) > 20){
            $arrChkErr["u_pw"] = "비밀번호는 8~20글자로 입력해 주세요.";
        }
        // PW 영문숫자특수문자 체크 (이거는 한번 해보세요.)
        if( $num == 0 || $eng == 0 || $spe == 0){
            $arrChkErr["u_pw1"] = "영문, 숫자, 특수문자를 혼합하여 입력해주세요.";
        }
        if( $tel == 0){
            $arrChkErr["u_tel"] = "올바른 전화번호가 아닙니다. 다시 입력해 주세요.";
        }
        $result1 = $this->model->getUserEmail($arrPost);
        if(count($result1) !== 0){
            $arrChkErr["u_email1"] = "가입한 계정이 있습니다.";
        }
        $result2 = $this->model->getUserEmail($arrPost,false);
        if(count($result2) !== 0){
            $arrChkErr["u_nickname"] = "이미 존재하는 닉네임입니다.";
        }
        // 비밀번호와 비밀번호체크 확인
        if($arrPost["u_pw"] !== $arrPost["pwChk"]){
            $arrChkErr["pwChk"] = "비밀번호와 비밀번호확인이 일치하지 않습니다.";
        }
        if( !preg_match('/^[a-zA-Z0-9]{1}[a-zA-Z0-9\-_]+@[a-z0-9]{1}[a-z0-9\-]+[a-z0-9]{1}\.(([a-z]{1}[a-z.]+[a-z]{1}[a-z]+)|([a-z]+))/u',$arrPost["u_email"]) ){
            $arrChkErr["u_email2"] = "올바른 이메일이 아닙니다. 다시 입력해 주세요.";
        }
        // NAME 글자수 체크
        if(mb_strlen($arrPost["u_email"]) > 30 || $arrPost["u_email"] === 0){
            $arrChkErr["u_email"] = "이메일은 30글자 이하로 입력해 주세요.";
        }
        
        // 유효성체크 에러일 경우
        if(!empty($arrChkErr)){
            // 에러메세지 셋팅
            $this->addDynamicProperty("arrChkErr", $arrChkErr);
            $this->addDynamicProperty("u_info", $arrPost);
            return "signup"._EXTENSION_PHP;
        }
        
        $result = $this->model->getUser($arrPost,false);
        if(count($result) !== 0){
            $errMsg = "입력하신 ID가 사용중입니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 회원가입페이지 페이지
            return "signup"._EXTENSION_PHP;
        }
        
        // **********Teransaction start**********
        $this->model->openConnBegin();

        if(!$this->model->signUp($arrPost)){
            $this->model->rollBackConn();
            echo "User Regist ERROR";
            exit();
        }
        $this->model->commitConn();
        $this->addDynamicProperty("signUpFlg", true);
        $this->model->closeConn();
        
        
        return "signup"._EXTENSION_PHP;
        // **********Teransaction End**********

        // $this->model->openconnbegin();
        // $result = $this->model->signUp($_POST);
        // if($result===1){
        //     $this->model->commitConn();
        //     $this->addDynamicProperty("signUpFlg", true);
        // }
        // else{
        //     $this->model->rollBackConn();
        // }
        // $this->model->closeConn();
        // return "signup"._EXTENSION_PHP;
    }

    public function idSearchGet(){
        return "idSearch"._EXTENSION_PHP;
    }
        
    public function idSearchPost(){

        $result = $this->model->idSearch($_POST);
        $this->model->closeConn();
        if($result == ""){
            $errMsg = "입력하신 회원 정보가 없습니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "idSearch"._EXTENSION_PHP;
        }else{
            $this->addDynamicProperty("u_id", $result["u_id"]);
            return  "idSearch"._EXTENSION_PHP;
        }
    }

    public function pwSearchGet(){
        return "pwSearch"._EXTENSION_PHP;
    }

    public function pwSearchPost(){
        $result = $this->model->pwSearch($_POST);
        $this->model->closeConn();
        if($result == ""){
            $errMsg = "입력하신 회원 정보가 없습니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "pwSearch"._EXTENSION_PHP;
        }else{
            $this->addDynamicProperty("u_pw", $result["u_pw"]);
            return  "pwSearch"._EXTENSION_PHP;
        }
    }

    public function myPageGet(){
        if(isset($_SESSION["u_id"])){
        $arr = ["u_id" => $_SESSION["u_id"] ];
        $result = $this->model->getUser($arr,false);
        $this->model->closeConn();
        $this->addDynamicProperty("u_info", $result[0]);
        return "myPage"._EXTENSION_PHP;
        }else{
            $this->addDynamicProperty("signUpFlg", true);
            return "login"._EXTENSION_PHP;
        }
    }








    public function correctionGet(){
        if(isset($_SESSION["u_id"])){
            $arr = ["u_id" => $_SESSION["u_id"] ];
            $result = $this->model->getUser($arr,false);
            $this->model->closeConn();
            $this->addDynamicProperty("u_info", $result[0]);
            return "correction"._EXTENSION_PHP;
            }else{
                $this->addDynamicProperty("signUpFlg", true);
                return "login"._EXTENSION_PHP;
            }
    }


    public function correctionPost(){
        $arrPost = $_POST;
        $arrChkErr = [];
        $tel = preg_match('/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}/u',$_POST["u_tel"]);
        // 유효성체크(영문자랑 숫자도 체크해야된다.)
        // ID 글자수 체크
        if(mb_strlen($arrPost["u_id"]) > 12 || mb_strlen($arrPost["u_id"]) < 6){
            $arrChkErr["u_id"] = "ID는 6글자 이상 12글자 이하로 입력해 주세요.";
        }
        // ID 영문숫자 체크 (이거는 한번 해보세요.)
        
        // NAME 글자수 체크
        if(mb_strlen($arrPost["u_email"]) > 30 || $arrPost["u_email"] === 0){
            $arrChkErr["u_email"] = "이메일은 30글자 이하로 입력해 주세요.";
        }
        if( $tel == 0){
            $arrChkErr["u_tel"] = "올바른 전화번호가 아닙니다. 다시 입력해 주세요.";
        }
        $result1 = $this->model->getUserEmail($arrPost);
        if(count($result1) !== 0){
            $arrChkErr["u_email1"] = "가입한 계정이 있습니다.";
        }
        $result2 = $this->model->getUserEmail($arrPost,false);
        if(count($result2) !== 0){
            $arrChkErr["u_nickname"] = "이미 존재하는 닉네임입니다.";
        }
        if( !preg_match('/^[a-zA-Z0-9]{1}[a-zA-Z0-9\-_]+@[a-z0-9]{1}[a-z0-9\-]+[a-z0-9]{1}\.(([a-z]{1}[a-z.]+[a-z]{1}[a-z]+)|([a-z]+))/u',$arrPost["u_email"]) ){
            $arrChkErr["u_email2"] = "올바른 이메일이 아닙니다. 다시 입력해 주세요.";
        }
        // 유효성체크 에러일 경우
        if(!empty($arrChkErr)){
            // 에러메세지 셋팅
            $this->addDynamicProperty("arrChkErr", $arrChkErr);
            $this->addDynamicProperty("u_info1", $arrPost);
            return "correction"._EXTENSION_PHP;
        }
        
        // $result = $this->model->getUser($arrPost,false);
        // if(count($result) !== 0){
        //     $errMsg = "입력하신 ID가 사용중입니다.";
        //     $this->addDynamicProperty("errMsg", $errMsg);
            // 회원가입페이지 페이지
            // return _BASE_REDIRECT."/user/correction";
        // }
        $result1 = $this->model->getUserID($arrPost,false);
        if( ($result1[0]["u_email"] === $arrPost["u_email"]) ){
            $errMsg = "변경 사항이 없습니다.";
            $this->addDynamicProperty("errMsg2", $errMsg);
            $this->addDynamicProperty("u_info1", $arrPost);
            return "correction"._EXTENSION_PHP;
        }else {
        // **********Teransaction start**********
            $this->model->openConnBegin();

            if(!$this->model->correctionUserInfo($arrPost)){
                $this->model->rollBackConn();
                echo "User correction ERROR";
                exit();
            }
            $this->model->commitConn();
            $this->model->closeConn();
            $this->addDynamicProperty("u_info", $arrPost);
            return "myPage"._EXTENSION_PHP;
        }
    }

    public function pwCorrectionGet(){
        if(isset($_SESSION["u_id"])){
            $arr = ["u_id" => $_SESSION["u_id"] ];
            $result = $this->model->getUser($arr,false);
            $this->model->closeConn();
            $this->addDynamicProperty("u_info", $result[0]);
            return "pwCorrection"._EXTENSION_PHP;
            }else{
                $this->addDynamicProperty("signUpFlg", true);
                return "login"._EXTENSION_PHP;
            }

    }

    public function pwCorrectionPost(){
        $arrPost = $_POST;
        $arrChkErr = [];
        $pw = $arrPost["u_pwc"];
        $patten = "/[^a-zA-Z0-9]/";
        $num = preg_match('/[0-9]/u', $pw);
        $eng = preg_match('/[a-z]/u', $pw);
        $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);
        // PW 글자수 체크
        if(mb_strlen($arrPost["u_pw"]) < 8 || mb_strlen($arrPost["u_pw"]) > 20){
            $arrChkErr["u_pw"] = "비밀번호는 8~20글자로 입력해 주세요.";
        }
        if(mb_strlen($arrPost["u_pwc"]) < 8 || mb_strlen($arrPost["u_pwc"]) > 20){
            $arrChkErr["u_pwc"] = "비밀번호는 8~20글자로 입력해 주세요.";
        }
        if(preg_match("/\s/u", $arrPost["u_pw"]) == true){
            $arrChkErr["u_pwb"] = "공백을 제거해 주세요.";
        }    
        if(preg_match("/\s/u", $arrPost["u_pwc"]) == true){
            $arrChkErr["u_pwcb"] = "공백을 제거해 주세요.";
        }    
        $result = $this->model->getUser($arrPost,false);
        if($arrPost["u_pw"] !== $result[0]["u_pw"]){
            $arrChkErr["pwChk1"] = "현재비밀번호가 일치하지 않습니다.";
        }else{
            if($arrPost["u_pw"] === $arrPost["u_pwc"]){
                $arrChkErr["pwChk"] = "이전 비밀번호와 같습니다.";
            }
        }
        if( $num == 0 || $eng == 0 || $spe == 0)
        {
            $arrChkErr["u_pwc1"] = "영문, 숫자, 특수문자를 혼합하여 입력해주세요.";
        }

        if(!empty($arrChkErr)){
            // 에러메세지 셋팅
            $this->addDynamicProperty("arrChkErr", $arrChkErr);
            $this->addDynamicProperty("u_info", $result[0]);
            return "pwCorrection"._EXTENSION_PHP;
        }

        $this->model->openConnBegin();

        if(!$this->model->correctionUserPw($arrPost)){
            $this->model->rollBackConn();
            $this->model->commitConn();
            echo "User pwCorrection ERROR";
            exit();
        }
        $this->model->commitConn();
        $this->addDynamicProperty("signUpFlg", true);
        $this->model->closeConn();
        $this->addDynamicProperty("u_info", $arrPost);
        echo "<script>alert('비밀번호가 변경 되었습니다.')</script>";
            return _BASE_REDIRECT."/user/logout";

    }
}
