<?php
/**
 * Created by PhpStorm.
 * User: Jbt
 * Date: 5/11/2016
 * Time: 5:51 AM
 */

namespace db;


class Mysqli
{
    private $conn;
    static private $instance;
    private function __construct(){
        $this->conn = mysqli_connect(Config::HOST,Config::USER,Config::PASS);
        mysqli_select_db($this->conn, Config::SCHEMA);
    }

    static public function getInstance(){
        if(!self::$instance){
            self::$instance = new Mysqli();
        }
        return self::$instance;
    }
    public function query($sql){
        //get the response
        $res=mysqli_query($this->conn,$sql);
        //if the result is error
        if(!$res){
            //show the error
            die(mysqli_error($this->conn) . "<br><pre>$sql</pre>");
        }
        return $res;
    }
}