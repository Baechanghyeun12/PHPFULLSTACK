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
        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];

        
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

        $this->model->openconnbegin();
        $result = $this->model->signUp($_POST);
        if($result===1){
            $this->model->commitConn();
            $this->addDynamicProperty("signUpFlg", true);
        }
        else{
            $this->model->rollBackConn();
        }
        $this->model->closeConn();
        return "signup"._EXTENSION_PHP;

    }
}
