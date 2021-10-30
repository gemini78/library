<?php 


/*
if (!function_exists('get_book')) 
{
    function get_book($id)
    {
        global $db;
        
        $req = $db->prepare("SELECT * FROM book WHERE id = ?");
        $req->execute([$id]);
        $result = $req->fetchObject();
        return $result;
    }
}
*/

if (!function_exists('update_book')) 
{
    function update_book($title,$isbn,$publish_at,$writer_id, $id)
    {
        global $db;
        
        $req = $db->prepare("UPDATE book SET title = :title, isbn = :isbn, publish_at = :publish_at, writer_id = :writer_id WHERE id = :id");
        $req->bindParam(':title', $title, PDO::PARAM_STR);       
        $req->bindParam(':isbn', $isbn, PDO::PARAM_STR);       
        $req->bindParam(':publish_at', $publish_at, PDO::PARAM_STR);       
        $req->bindParam(':writer_id', $writer_id, PDO::PARAM_INT);       
        $req->bindParam(':id', $id, PDO::PARAM_INT);       
        $req->execute();
    }
}

