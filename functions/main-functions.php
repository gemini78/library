<?php

$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND    => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION
];

try{
    $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD, $options);
} catch(Exception $e)
{
    echo 'Erreur : '.$e->getMessage().'<br />';
}

if (!function_exists('e')) 
{
    function e($data)
    {
        if ($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
        }
        return $data;
    }
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

require_once '../classes/SinglePDO.php';

if (!function_exists('get_writers')) 
{
    function get_writers() 
    {
        //global $db;
        $db = SinglePDO::getInstance();

        $stmt = $db->query("SELECT * FROM writer");
        $result = [];
        while($rows = $stmt->fetchObject()) {
            $result[] = $rows;
        }
        return $result;
    }
}

if (!function_exists('get_book')) 
{
    function get_book($id)
    {
        //global $db;
        $db = SinglePDO::getInstance();
        
        $stmt = $db->prepare("SELECT * FROM book WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);  
        $stmt->execute();
        $result = $stmt->fetchObject();
        return $result;
    }
}


if (!function_exists('get_book_all')) 
{
    function get_book_all($id)
    {
        //global $db;
        $db = SinglePDO::getInstance();
        
        $stmt = $db->prepare("SELECT B.id, B.title, B.publish_at, B.writer_id, B.isbn, B.path_image, B.price, B.synopsys, W.firstname, W.lastname FROM book AS B JOIN writer AS W ON B.writer_id = W.id WHERE B.id = :id" );
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);  
        $stmt->execute();
        $result = $stmt->fetchObject();
        return $result;
    }
}

if (!function_exists('get_rowCountBook')) 
{
    function get_rowCountBook()
    {
        //global $db;
        $db = SinglePDO::getInstance();
        $count = $db->query("SELECT COUNT(id) FROM book")->fetch(PDO::FETCH_NUM)[0]; 
        return (int)$count;
    }
}


if (!function_exists('save_input_data')) 
{
    function save_input_data()
    {
       foreach ($_POST as $key => $value) {
           if (strpos($key,'password') === false) {
               $_SESSION['input'][$key] = $value;
           }
       }
    }
}

if (!function_exists('get_input_data')) 
{
    function get_input_data($key)
    {
       return !empty($_SESSION['input'][$key])
        ? e($_SESSION['input'][$key])
        :null;
    }
}


if (!function_exists('clear_input_data')) 
{
    function clear_input_data()
    {
       if (isset($_SESSION['input'])) {
        $_SESSION['input'] = [];
       }
    }
}

if (!function_exists('set_flash')) 
{
    function set_flash($message,$type='info')
    {
        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
}

if (!function_exists('set_session_user')) 
{
    function set_session_user(string $pseudo)
    {
        $_SESSION['pseudo'] = $pseudo;
    }
}

if (!function_exists('get_session_user')) 
{
    function get_session_user()
    {
        if(isset($_SESSION['pseudo'])) {
            return $_SESSION['pseudo'];
        }
        return null;
    }
}


if (!function_exists('redirect')) 
{
    function redirect(string $url)
    {
        header('Location: '.$url);
        exit;
    }
}

if (!function_exists('getBooksFromCart')) 
{
    function getBooksFromCart() 
    {
        //global $db;
        $db = SinglePDO::getInstance();
        $ids = array_keys($_SESSION['cart']);
        if(empty($ids)) {
            return [];
        }
        $stmt = $db->prepare("SELECT * FROM book WHERE id IN ( ".implode(',',$ids)." )");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

if (!function_exists('update_image_book')) 
{
    function update_image_book($path_image, $id)
    {
        // global $db;
        $db = SinglePDO::getInstance();
                
        $stmt = $db->prepare("UPDATE book SET path_image = :path_image WHERE id = :id");
        $stmt->bindValue(':path_image', $path_image, PDO::PARAM_STR);     
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);       
        $stmt->execute();
    }
}

if (!function_exists('deleteFileIfExiste')) 
{
    function deleteFileIfExiste($pathFile)
    {
        $arrayImages= scandir('images/');
        if (in_array($pathFile, $arrayImages) && $pathFile != "noCover.jpg") {
            unlink('images/' . $pathFile);
        }
    }
}
