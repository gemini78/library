<?php 

function get_books_all()
{
    global $db;
    $req = $db->query("SELECT book.*,writer.firstname ,writer.lastname FROM book JOIN writer ON book.writer_id = writer.id");
    $req->setFetchMode(PDO::FETCH_OBJ); 
    $result = [];
    while($rows = $req->fetchObject()) {
        $result[] = $rows;
    }
    return $result;
}