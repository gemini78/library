<?php 
if (!function_exists('getIdOneBook')) 
{
    function getIdOneBook($id) 
    {
        global $db;
        
        $stmt = $db->prepare("SELECT id FROM book WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);  
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}