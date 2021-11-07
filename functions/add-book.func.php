<?php 

if (!function_exists('is_already_use')) 
{
    function is_already_use($field, $value, $table) 
    {
        global $db;

        $stmt = $db->prepare("SELECT id FROM $table WHERE $field = :value");
        $stmt->bindValue(':value', $value, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $stmt->closeCursor();  
        return $count;
    }
}

if (!function_exists('createBook')) 
{
    function createBook($title,$isbn,$publish_at,$writer_id,$price) 
    {
        global $db;

        $stmt = $db->prepare("INSERT INTO book (title,isbn,publish_at,writer_id,price) VALUES (:title,:isbn,:publish_at,:writer_id,:price)");
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':isbn', $isbn, PDO::PARAM_STR);
        $stmt->bindValue(':publish_at', $publish_at, PDO::PARAM_STR);
        $stmt->bindValue(':writer_id', $writer_id, PDO::PARAM_INT);
        $stmt->bindValue(':price', $price, PDO::PARAM_STR);
        $stmt->execute();
        return $db->lastInsertId();
    }
}

if (!function_exists('validatePrice')) 
{
    function validatePrice($price) 
    {   
        return is_numeric($price) && !strpos($price, ',');
    }
}



