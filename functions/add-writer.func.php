<?php 
if (!function_exists('createWriter')) 
{
    function createWriter($firstname,$lastname,$birthday) 
    {
        //global $db;
        $db = SinglePDO::getInstance();

        $stmt = $db->prepare("INSERT INTO writer (firstname,lastname,birthday) VALUES (:firstname,:lastname,:birthday)");
        $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
        
        $stmt->execute();
    
    }
}