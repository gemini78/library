<?php 

function get_books_all($search=null)
{
    global $db;

    $booksPerPage = 4;
    $totalBook = get_rowCountBook();
    $nbBookPage = ceil($totalBook/$booksPerPage);
    if(isset($_GET['p']) && !empty($_GET['p']) && ctype_digit($_GET['p'])==1) {
        if($_GET['p'] > $nbBookPage) {
        $current = $nbBookPage;
        } else {
        $current = $_GET['p'];
        }
    } else {
        $current = 1;
    }

    $firstBookOfPage = ($current-1)*$booksPerPage;

    if ($search == null) {
        $stmt = $db->query("SELECT book.*,writer.firstname ,writer.lastname FROM book JOIN writer ON book.writer_id = writer.id LIMIT $firstBookOfPage,$booksPerPage");
    } else {
        $search = str_replace("'", "\'", $search);
        addslashes($search);
        $sql = "SELECT book.*,writer.firstname ,writer.lastname FROM book JOIN writer ON book.writer_id = writer.id WHERE title LIKE '%".$search."%'";
      
        $stmt = $db->query($sql);
    }
    $stmt->setFetchMode(PDO::FETCH_OBJ); 
    $result['rows'] = [];
    while($rows = $stmt->fetchObject()) {
        $result['rows'][] = $rows;
    }
    $result['pagination'] = [
        'nbBookPage' => $nbBookPage,
        'current' => $current,
    ];
    return $result;
}

/**
 * for pagination
 */

if (!function_exists('get_currentPage')) 
{
    function get_currentPage() 
    {
        return (int)$_GET['p'];
    }
}