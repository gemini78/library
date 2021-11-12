<?php 

class Cart
{
    public function __construct()
    {
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function add($book_id)
    {
        if(isset($_SESSION['cart'][$book_id])) {
            $_SESSION['cart'][$book_id]++;
        } else {
            $_SESSION['cart'][$book_id] = 1;
        }
    }

    public function del($book_id)
    {
        unset($_SESSION['cart'][$book_id]);
    }

    public function decQuantity($book_id)
    {
        if (isset($_SESSION['cart'][$book_id]) && !empty($_SESSION['cart'][$book_id])) {
            if($_SESSION['cart'][$book_id]>1) {
                $_SESSION['cart'][$book_id]--;
            }   
        }
    }

    public function total()
    {
        $sum = 0;
        $ids = array_keys($_SESSION['cart']);
        if(empty($ids)) {
            $books = [];
        } else {
            $books = getBooksFromCart();
        }

        foreach ($books as $book) {
            $sum += $book->price * $_SESSION['cart'][$book->id];
        }
        
        return $sum;
    }
}