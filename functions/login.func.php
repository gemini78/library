<?php 

if (!function_exists('validateMinLength')) 
{
    function validateMinLength($string) 
    {
        return mb_strlen($string,'utf-8')>2;
    
    }
}