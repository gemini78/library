<?php 

if (!function_exists('delete_book')) 
{
    function delete_book($id)
    {
        global $db;
        $sql = "DELETE FROM book WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);   
        $stmt->execute();
        return true;
    }
}