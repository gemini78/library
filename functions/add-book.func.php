<?php 

/*
if (!function_exists('not_empty')) 
{
    function not_empty($fields = [])
    {
        if (count($fields) != 0) {
            foreach ($fields as $field) {
                if (empty($_POST[$field]) || trim($_POST[$field]) == "") {
                    return false;
                }
            }
            return true;
        }
    }
}
*/

if (!function_exists('is_already_use')) 
{
    function is_already_use($field, $value, $table) 
    {
        global $db;

        $q = $db->prepare("SELECT id FROM $table WHERE $field = ?");
        $q->execute([$value]);
        $count = $q->rowCount();
        $q->closeCursor();  
        return $count;
    }
}

if (!function_exists('createBook')) 
{
    function createBook($title,$isbn,$publish_at,$writer) 
    {
        global $db;

        $q = $db->prepare("INSERT INTO book (title,isbn,publish_at,writer_id) VALUES (?,?,?,?)");
        $q->execute([$title,$isbn,$publish_at,$writer]);
        return $db->lastInsertId();
    }
}

if (!function_exists('update_image_book')) 
{
    function update_image_book($path_image, $id)
    {
        global $db;
        
        $req = $db->prepare("UPDATE book SET path_image = :path_image WHERE id = :id");
        $req->bindParam(':path_image', $path_image, PDO::PARAM_STR);     
        $req->bindParam(':id', $id, PDO::PARAM_INT);       
        $req->execute();
    }
}

