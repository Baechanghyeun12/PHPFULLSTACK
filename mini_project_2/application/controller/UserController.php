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
        // 유효성체크(영문자랑 숫자도 체크해야된다.)
        // ID 글자수 체크
        if(mb_strlen($arrPost["u_id"]) > 12 || mb_strlen($arrPost["u_id"]) === 0){
            $arrChkErr["u_id"] = "ID는 12글자 이하로 입력해 주세요.";
        }
        // ID 영문숫자 체크 (이거는 한번 해보세요.)

        
        // PW 글자수 체크
        if(mb_strlen($arrPost["u_pw"]) < 8 || mb_strlen($arrPost["u_pw"]) > 20){
            $arrChkErr["u_pw"] = "비밀번호는 8~20글자로 입력해 주세요.";
        }
        // PW 영문숫자특수문자 체크 (이거는 한번 해보세요.)
        
        
        
        // 비밀번호와 비밀번호체크 확인
        if($arrPost["u_pw"] !== $arrPost["pwChk"]){
            $arrChkErr["pwChk"] = "비밀번호와 비밀번호확인이 일치하지 않습니다.";
        }
        
        // NAME 글자수 체크
        if(mb_strlen($arrPost["u_email"]) > 30 || $arrPost["u_email"] === 0){
            $arrChkErr["u_email"] = "이메일은 30글자 이하로 입력해 주세요.";
        }
        
        // 유효성체크 에러일 경우
        if(!empty($arrChkErr)){
            // 에러메세지 셋팅
            $this->addDynamicProperty("arrChkErr", $arrChkErr);
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
        $this->model->closeConn();
        
        
        return _BASE_REDIRECT."/user/login";
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
            return header(_BASE_REDIRECT."/user/login");
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
                return header(_BASE_REDIRECT."/user/login");
            }
    }


    public function correctionPost(){
        $arrPost = $_POST;
        $arrChkErr = [];
        // 유효성체크(영문자랑 숫자도 체크해야된다.)
        // ID 글자수 체크
        if(mb_strlen($arrPost["u_id"]) > 12 || mb_strlen($arrPost["u_id"]) === 0){
            $arrChkErr["u_id"] = "ID는 12글자 이하로 입력해 주세요.";
        }
        // ID 영문숫자 체크 (이거는 한번 해보세요.)
        
        // NAME 글자수 체크
        if(mb_strlen($arrPost["u_email"]) > 30 || $arrPost["u_email"] === 0){
            $arrChkErr["u_email"] = "이메일은 30글자 이하로 입력해 주세요.";
        }
        
        // 유효성체크 에러일 경우
        if(!empty($arrChkErr)){
            // 에러메세지 셋팅
            $this->addDynamicProperty("arrChkErr", $arrChkErr);
            return "correction"._EXTENSION_PHP;
        }
        
        $result = $this->model->getUser($arrPost,false);
        if(count($result) !== 0){
            $errMsg = "입력하신 ID가 사용중입니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 회원가입페이지 페이지
            return "correction"._EXTENSION_PHP;
        }



        $result1 = $this->model->getUserID($arrPost["u_no"],false);
        var_dump($result1);
        if($result1[0]["u_id"] === $arrPost["u_id"] && $result1[0]["u_email"] === $arrPost["u_email"] ){
            $errMsg = "변경 사항이 없습니다.";
            $this->addDynamicProperty("errMsg2", $errMsg);
            // return "correction"._EXTENSION_PHP;
        }
        // **********Teransaction start**********
        
        $this->model->openConnBegin();

        if(!$this->model->correctionUserInfo($arrPost)){
            $this->model->rollBackConn();
            echo "User correction ERROR";
            exit();
        }
        $this->model->commitConn();
        $this->model->closeConn();
        
        
        // return _BASE_REDIRECT."/user/logout";
    }
}
