<?php 
if (!function_exists('createWriter')) 
{
    function createWriter($firstname,$lastname,$birthday) 
    {
        global $db;

        $q = $db->prepare("INSERT INTO writer (id, firstname,lastname,birthday) VALUES (null,?,?,?)");
        $q->execute([$firstname,$lastname,$birthday]);
    
    }
}