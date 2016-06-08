<?php
/**
 * Created by PhpStorm.
 * User: Jbt
 * Date: 5/18/2016
 * Time: 6:23 AM
 */

namespace restful;


class Employees extends RestAbstract
{
    protected function getTableName()
    {
        return 'employees';// actual table name to query
    }
 
    public function put()
    {
        // TODO: Implement put() method.
    }
    public function delete()
    {
        // TODO: Implement delete() method.
    }
}