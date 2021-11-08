<?php 
if (!function_exists('getIdOneBook')) 
{
    function getIdOneBook($id) 
    {
        //global $db;
        $db = SinglePDO::getInstance();

        
        $stmt = $db->prepare("SELECT id FROM book WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);  
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}