<?php 

//require_once '../classes/SinglePDO.php';

if (!function_exists('update_book')) 
{
    function update_book($title,$isbn,$publish_at,$writer_id,$price,$id)
    {
        //global $db;
        $db = SinglePDO::getInstance();
        
        $stmt = $db->prepare("UPDATE book SET title = :title, isbn = :isbn, publish_at = :publish_at, writer_id = :writer_id, price = :price WHERE id = :id");
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);       
        $stmt->bindValue(':isbn', $isbn, PDO::PARAM_STR);       
        $stmt->bindValue(':publish_at', $publish_at, PDO::PARAM_STR);       
        $stmt->bindValue(':writer_id', $writer_id, PDO::PARAM_INT);       
        $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
        $stmt->bindValue(':price', $price, PDO::PARAM_STR);       
        $stmt->execute();
    }
}

