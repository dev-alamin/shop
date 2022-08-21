<?php
require_once '../lib/Database.php';
require_once '../helpers/Format.php';
require_once '../lib/Session.php';

$session = Session::CheckLogin();

class AdminLogin {
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();    
        $this->fm = new Format();    
    }

    public function adminLogin( $user, $pass){
        $user = $this->fm->validation( $user );
        $pass = $this->fm->validation( $pass );

        $user = mysqli_real_escape_string( $this->db->link, $user );
        $pass = mysqli_real_escape_string( $this->db->link, $pass );

        if( empty( $user ) || empty( $pass ) ) {
            $loginMsg = "Username or Password cannot be empty!";
            return $loginMsg;
        }else{
            $query = "SELECT * 
            FROM shop_admin 
            WHERE username = '$user' AND password = '$pass'";

            $result = $this->db->select( $query );
            if( $result != false ){
                $value = $result->fetch_assoc();
                Session::set( "adminlogin", true );
                Session::set( "adminid", $value['id'] );
                Session::set( "adminuname", $value['username'] );
                Session::set( "adminname", $value['name'] );
                header("Location:dashboard.php");
            }else{
                $loginMsg = "Username or Password not match";
                return $loginMsg;
            }
        }
    }
}