<?php
/**
 * Created by PhpStorm.
 * User: Jbt
 * Date: 5/18/2016
 * Time: 4:14 AM
 */

namespace creditcards;


abstract class CreditCardAbstract{
    abstract public function setCC();
    abstract public function createTransaction();
    abstract public function getResponse();

    public function getCCNum(){
        echo "1234";
    }
}