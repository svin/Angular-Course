<?php
/**
 * Created by PhpStorm.
 * User: Jbt
 * Date: 5/18/2016
 * Time: 5:30 AM
 */

namespace restful;


abstract class RestAbstract{
    //will return the table name from the child
    abstract protected function getTableName();

    public function getMethod()
    {
        return  strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function get($id=null/*default val*/)
    {
        // get singleton instance
        $db = \db\Mysqli::getInstance();
        $sql = "SELECT * FROM ".$this->getTableName();/*will be implemented by child*/
        if($id){
            $sql.= " WHERE id=$id";
        }
        $dbRes=$db->query($sql);
        //if id exist we need to return only the object
        if($id){
            return mysqli_fetch_assoc($dbRes);
        }
        // init the result
        $resultSet=[];
        // loop through the DB results
        while($answer = mysqli_fetch_assoc($dbRes)){
            // push the $answer object into the array
            $resultSet[]=$answer;
        };
        return $resultSet;
    }

    public function post()
    {
        //get the raw data
        $jsonStr=file_get_contents('php://input');
        //convert json str to object
        $jsonArr=json_decode($jsonStr,true);
        $db = \db\Mysqli::getInstance();
        $cols = implode(',' , array_keys($jsonArr));
        $vals = "'".implode("','" , $jsonArr)."'";
        $sql="INSERT INTO ".$this->getTableName()
            ."($cols) VALUES($vals)";
        return $db->query($sql);
    }
    
    abstract public function put();
    abstract public function delete();

}