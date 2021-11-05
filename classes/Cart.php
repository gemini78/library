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
}