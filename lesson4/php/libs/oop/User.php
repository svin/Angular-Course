<?php
namespace oop;
/**
 * Created by PhpStorm.
 * User: Jbt
 * Date: 5/11/2016
 * Time: 3:44 AM
 */

class User{
    protected $name;
    protected $email;
    static private $instances=0;

    /**
     * @return int
     */
    public static function getInstances()
    {
        return self::$instances;
    }


    public function __construct(){
        self::$instances++;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

}