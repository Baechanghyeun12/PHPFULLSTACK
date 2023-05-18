<?php

namespace application\model;

class UserModel extends Model{
    public function getUser($arrUserInfo, $pwFlg = true){
        $sql = " SELECT * FROM user_info WHERE u_id = :u_id ";

        // PW 추가할 경우
        if($pwFlg){
            $sql.=" AND u_pw = :u_pw ";
        }
        
        $prepare = [
            ":u_id" => $arrUserInfo["u_id"]
        ];

        // PW 추가할 경우
        if($pwFlg){
            $prepare[":u_pw"] = $arrUserInfo["u_pw"];
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch (Exception $e) {
            echo "UserModel->getUser Error : ".$e->getMessage();
            exit();
        }
        // finally{
        //     $this->closeConn();
        // }
        return $result;
    }

    public function signUp($arrUserInfo){
        $sql = " INSERT INTO user_info ("
                ." u_id "
                ." ,u_pw "
                ." ,u_email "
                ." ,u_name "
                ." ,u_nickname "
                ." ,u_tel "
                .")"
                ." VALUES ("
                ." :u_id "
                ." ,:u_pw "
                ." ,:u_email "
                ." ,:u_name "
                ." ,:u_nickname "
                ." ,:u_tel "
                ." ) "
                ;
        $prepare = [
            ":u_id" => $arrUserInfo["u_id"]
            ,":u_pw" => $arrUserInfo["u_pw"]
            ,":u_email" => $arrUserInfo["u_email"]
            ,":u_name" => $arrUserInfo["u_name"]
            ,":u_nickname" => $arrUserInfo["u_nickname"]
            ,":u_tel" => $arrUserInfo["u_tel"]
        ];
        try {
            // $this->conn->begintransaction();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->rowcount();
            return $result;
            // $this->conn->commit();
        } catch (Exception $e) {
            return false;
        }
        // finally{
        //     $this->closeConn();
        // }
    }
    public function idSearch($param){
        $sql = " SELECT "
                ." u_id "
                ." FROM user_info "
                ." WHERE "
                ." u_email = :u_email "
                ;
    
                $arr_prepare =
                array(
                    ":u_email"  => $param["u_email"]
                );
    
            try
            {
                $stmt = $this->conn->prepare( $sql );
                $stmt->execute( $arr_prepare );
                $result = $stmt->fetchAll();
            }
            catch (Exception $e)
            {
                return $e->getMessage();
            }
            if(empty($result)){
                return "";
            }
            else{
                return $result[0];
            }
    }

    public function pwSearch($param){
        $sql = " SELECT "
                ." u_pw "
                ." FROM user_info "
                ." WHERE "
                ." u_email = :u_email "
                ." AND "
                ." u_id = :u_id "
                ;
    
                $arr_prepare =
                array(
                    ":u_email" => $param["u_email"]
                    ,":u_id" => $param["u_id"]
                );
    
            try
            {
                $stmt = $this->conn->prepare( $sql );
                $stmt->execute( $arr_prepare );
                $result = $stmt->fetchAll();
            }
            catch (Exception $e)
            {
                return $e->getMessage();
            }
            if(empty($result)){
                return "";
            }
            else{
                return $result[0];
            }
    }

    public function correctionUserInfo($arrUserInfo){
        $sql = " UPDATE user_info "
                ." SET  u_email = :u_email, u_name = :u_name, u_nickname = :u_nickname, u_tel = :u_tel "
                ." WHERE u_no = :u_no "
                ;
        
                $prepare = [
                    ":u_email" => $arrUserInfo["u_email"]
                    ,":u_no" => $arrUserInfo["u_no"]
                    ,":u_name" => $arrUserInfo["u_name"]
                    ,":u_nickname" => $arrUserInfo["u_nickname"]
                    ,":u_tel" => $arrUserInfo["u_tel"]
                ];
                try {
                    // $this->conn->begintransaction();
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute($prepare);
                    $result = $stmt->rowcount();
                    return $result;
                    // $this->conn->commit();
                } catch (Exception $e) {
                    return false;
                }
                // finally{
                //     $this->closeConn();
                // }
    }

    public function getUserID($arrUserInfo, $pwFlg = true){
        $sql = " SELECT * FROM user_info WHERE u_no = :u_no ";

        // PW 추가할 경우
        if($pwFlg){
            $sql.=" AND u_pw = :u_pw ";
        }
        
        $prepare = [
            ":u_no" => $arrUserInfo["u_no"]
        ];

        // PW 추가할 경우
        if($pwFlg){
            $prepare[":u_pw"] = $arrUserInfo["u_pw"];
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch (Exception $e) {
            echo "UserModel->getUser Error : ".$e->getMessage();
            exit();
        }
        // finally{
        //     $this->closeConn();
        // }
        return $result;
    }


    public function correctionUserPw($arrUserInfo){
        $sql = " UPDATE user_info "
                ." SET  u_pw = :u_pw "
                ." WHERE u_id = :u_id "
                ;
        
                $prepare = [
                    ":u_pw" => $arrUserInfo["u_pwc"]
                    ,":u_id" => $arrUserInfo["u_id"]
                ];
                try {
                    // $this->conn->begintransaction();
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute($prepare);
                    $result = $stmt->rowcount();
                    return $result;
                    // $this->conn->commit();
                } catch (Exception $e) {
                    return false;
                }
                // finally{
                //     $this->closeConn();
                // }
    }

    public function getUserEmail($arrUserInfo, $flg = true){
        $sql = " SELECT * FROM user_info  ";
        if($flg){
            $sql .= " WHERE u_email = :u_email ";
        } else {
            $sql .=" WHERE u_nickname = :u_nickname";
        }
        $prepare = [];
        if($flg){
            $prepare[":u_email"] = $arrUserInfo["u_email"];
        } else {
            $prepare[":u_nickname"] = $arrUserInfo["u_nickname"];
        }
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch (Exception $e) {
            echo "UserModel->getUser Error : ".$e->getMessage();
            exit();
        }
        // finally{
        //     $this->closeConn();
        // }
        return $result;
    }
}
