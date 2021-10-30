<?php 

function get_books_all($search=null)
{
    global $db;
    if ($search == null) {
        $req = $db->query("SELECT book.*,writer.firstname ,writer.lastname FROM book JOIN writer ON book.writer_id = writer.id");
    } else {
        $search = str_replace("'", "\'", $search);
        addslashes($search);
        $sql = "SELECT book.*,writer.firstname ,writer.lastname FROM book JOIN writer ON book.writer_id = writer.id WHERE title LIKE '%".$search."%'";
      
        $req = $db->query($sql);
    }
    $req->setFetchMode(PDO::FETCH_OBJ); 
    $result = [];
    while($rows = $req->fetchObject()) {
        $result[] = $rows;
    }
    return $result;
}