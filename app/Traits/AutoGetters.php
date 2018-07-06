<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 06.07.2018
 * Time: 13:10
 */

namespace App\Traits;


trait AutoGetters
{
    public function __get($name)
    {
        return null;
    }

    public function __call($name, $arguments)
    {
        if(empty($arguments) && preg_match('/(?:get)(w+)/',$name,$matches))
            return $this->{lcfirst($matches[1])};
    }

}