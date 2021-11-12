<?php
//$cart = new Cart;
if (isset($_GET['del'])) {
    $cart->del($_GET['del']);
    redirect('?page=add-cart');
} else {
    if (isset($_GET['dec'])) {
        $cart->decQuantity($_GET['dec']);
        redirect('?page=add-cart');
} else {
        if (isset($_GET['id'])) {
            $Onebook = getIdOneBook($_GET['id']);

            if (empty($Onebook)) {
                set_flash("Ce produit n'existe pas", 'danger');

                //Redirection vers home
                redirect('?page=home');

            } else {
                $cart->add($Onebook->id);
                redirect('?page=add-cart');
                //die('Le produit a bien été ajouté <a href="javascript::history.back()">au catalogue</a>');
            }
        }
    }
}


//var_dump($_SESSION);
$books = getBooksFromCart();

$sum = $cart->total();
?>
<section class="section-add-cart">


    <?php if (count($books) > 0) : ?>
        <h1>Votre panier</h1>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Price TTC</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($books as $book) { ?>
                    <tr>
                        <td><img src="./images/<?= $book->path_image; ?>" width="200" height="200" alt="<?= $book->title ?>'image"></td>
                        <td><?= $book->title ?></td>
                        <td>
                            <?php if ($_SESSION['cart'][$book->id] > 1) :  ?>
                                <a href="?page=add-cart&dec=<?= $book->id ?>" class="cart_left"><i class="fas fa-minus"></i></a>
                            <?php endif  ?>

                            <?= $_SESSION['cart'][$book->id] ?>
                            <a href="?page=add-cart&id=<?= $book->id ?>" class="cart_right"><i class="fas fa-plus"></i></a>
                        </td>
                        <td><?= number_format($book->price, 2, '.', ' ') ?> €</td>
                        <td><?= number_format($book->price * 1.196, 2, '.', ' ') ?> €</td>
                        <td><a href="?page=add-cart&del=<?= $book->id ?>"><i class="fas fa-trash-alt fa-2x"></i></a></td>
                    </tr>
                <?php }

                ?>
            </tbody>
            <tfoot>
                <td colspan="2">&nbsp;</td>
                <td>sum</td>
                <td><?= number_format($sum, 2, '.', ' ') ?> €</td>
                <td><?= number_format($sum * 1.196, 2, '.', ' ') ?> €</td>
                <td>&nbsp;</td>
            </tfoot>
        </table>
    <?php else : ?>
        <h1>Le panier est vide</h1>
    <?php endif ?>
</section>