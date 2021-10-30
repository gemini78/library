<?php
const DB_HOST = 'localhost';
const DB_NAME = 'library_db';
const DB_USER = 'root';
const DB_PSWD = '';

$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND    => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION
];

try{
    $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PSWD, $options);
} catch(Exception $e)
{
    echo 'Erreur : '.$e->getMessage().'<br />';
}


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

if (!function_exists('get_rowCountBook')) 
{
    function get_rowCountBook()
    {
        global $db;
        $count = $db->query("SELECT COUNT(id) FROM book")->fetch(PDO::FETCH_NUM)[0]; 
        return (int)$count;
    }
}

?>