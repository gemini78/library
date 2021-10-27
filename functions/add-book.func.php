<?php 

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

        $q = $db->prepare("INSERT INTO book (id, title,isbn,publish_at,writer_id) VALUES (null,?, ?,?,?)");
        $q->execute([$title,$isbn,$publish_at,$writer]);
    
    }
}

if (!function_exists('get_writers')) 
{
    function get_writers() 
    {
        global $db;

        $req = $db->query("SELECT * FROM writer");
        $result = [];
        while($rows = $req->fetchObject()) {
            $result[] = $rows;
        }
        return $result;
    
    }
}

