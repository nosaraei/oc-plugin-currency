<?php namespace Responsiv\Currency\Api\Classes;

use Responsiv\Currency\Api\Resources\Currency;

class Configuration
{
    public static function currency($application, $request){
        
        return Currency::getDefault();
    }
}