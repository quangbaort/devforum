<?php

namespace App\Helpers;

class Helper {


    public static function getRouterNameOfModule($module, $className) : string
    {
        $request = app()->request;
        $routerName = $request->router()->getName();
        if($routerName == $module)  return $className;
        return '';
    }
}
