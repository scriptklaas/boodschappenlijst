<?php

class Validator 
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        if (is_numeric($value)){
            return false;
        } else {
           return strlen($value) >= $min && strlen($value) <= $max;
        }
    }
    public static function integer($value, $min = 1, $max = 100)
    {
        $options = array(
            "options" => array(
                "default" => 0,
                "min_range" => $min,
                "max_range" => $max,
            )
        );
        return filter_var($value, FILTER_VALIDATE_INT, $options);
    }

    public static function decimal($value, $min, $max)
    {        
        $options = array(
            "options" => array(
                "default" => 0,
                "min_range" => 0,
                "max_range" => 100,
            )
        );

        $explodedDecimals = explode('.', $value);
        
        if (is_numeric($value)){
            if (isset($explodedDecimals[1])) {
                $numberOfDecimals = strlen($explodedDecimals[1]);
                if ($numberOfDecimals >= $min && $numberOfDecimals <= $max){
                    return filter_var($value, FILTER_VALIDATE_FLOAT, $options);
                } else {
                    return false;
                }
            } else {
                return filter_var($value, FILTER_VALIDATE_FLOAT, $options);
            }
        } else {
            return false;
        }
    }
}