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


if (!function_exists('getBooksFromCart')) 
{
    function getBooksFromCart() 
    {
        global $db;
        
        $ids = array_keys($_SESSION['cart']);
        if(empty($ids)) {
            return [];
        }
        $stmt = $db->prepare("SELECT * FROM book WHERE id IN ( ".implode(',',$ids)." )");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}