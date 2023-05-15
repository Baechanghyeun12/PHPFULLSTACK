<?php

namespace application\model;

class UserModel extends Model{
    public function getUser($arrUserInfo){
        $sql = " SELECT * FROM user_info WHERE u_id = :id AND u_pw = :pw ";
        $prepare = [
            ":id" => $arrUserInfo["id"]
            ,":pw"=> $arrUserInfo["pw"]
        ];
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
                .")"
                ." VALUES ("
                ." :u_id "
                ." ,:u_pw "
                ." ) "
                ;
        $prepare = [
            ":u_id" => $arrUserInfo["u_id"]
            ,":u_pw" => $arrUserInfo["u_pw"]
        ];
        try {
            // $this->conn->begintransaction();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->rowcount();
            return $result;
            // $this->conn->commit();
        } catch (Exception $e) {
            echo "UserModel->getUser Error : ".$e->getMessage();
            // $this->conn->rollback();
            exit();
        }
        // finally{
        //     $this->closeConn();
        // }
    }
    function id_search(&$param){
        $sql = " SELECT "
                ." login_id "
                ." FROM login "
                ." WHERE "
                ." login_email = :login_email "
                ;
    
                $arr_prepare =
                array(
                    ":login_email"  => $param["login_email"]
                );
    
            $conn = null;
    
            try
            {
                db_conn( $conn );
                $stmt = $conn->prepare( $sql );
                $stmt->execute( $arr_prepare );
                $result = $stmt->fetchAll();
            }
            catch (Exception $e)
            {
                return $e->getMessage();
            }
            finally
            {
                $conn = null;
            }
            return $result;
    }

    function pw_search(&$param){
        $sql = " SELECT "
                ." login_password "
                ." FROM login "
                ." WHERE "
                ." login_email = :login_email "
                ." AND "
                ." login_id = :login_id "
                ;
    
                $arr_prepare =
                array(
                    ":login_email" => $param["login_email"]
                    ,":login_id" => $param["login_id"]
                );
    
            $conn = null;
    
            try
            {
                db_conn( $conn );
                $stmt = $conn->prepare( $sql );
                $stmt->execute( $arr_prepare );
                $result = $stmt->fetchAll();
            }
            catch (Exception $e)
            {
                return $e->getMessage();
            }
            finally
            {
                $conn = null;
            }
            return $result;
    }
}
