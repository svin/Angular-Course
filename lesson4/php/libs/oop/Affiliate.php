<?php
namespace oop;
/**
 * Created by PhpStorm.
 * User: Jbt
 * Date: 5/11/2016
 * Time: 3:47 AM
 */
class Affiliate extends User{
    protected $numOfClients = 0;

    /**
     * @return int
     */
    public function getNumOfClients()
    {
        return $this->numOfClients;
    }

    /**
     * @param int $numOfClients
     */
    public function setNumOfClients($numOfClients)
    {
        $this->numOfClients = $numOfClients;
    }
}