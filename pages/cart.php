<?php
$cart = $_SESSION['cart'];

if(isset($_GET['id']) && isset($_GET['quantity'])){
    $id=$_GET['id'];
    if(empty($cart[$id])){$cart[$id]= 0;}
    $cart[$id] += $_GET['quantity'];
    $_SESSION['cart'] = $cart;
    header('Location: ?page=cart');
}

// Vider le panier
if(isset($_GET['type'])=='empty'){
    unset($cart);
    var_dump($cart);
    // header('Location: ?page=cart');
}

?>

<table class="my-5 w-50 m-auto table table-sm">
    <tr>
        <th>Article</th>
        <th>Quantité</th>
        <th>Prix unitaire TTC</th>
        <th>Total TTC</th>
        <th>Total HT</th>
    </tr>

    <?php
foreach($cart as $idArticle => $quantity){
    ?>
    <tr>
    <td><?php echo $articles[$idArticle][0]; ?></td>
    <td><?php echo $quantity; ?></td>
    <td><?php echo $articles[$idArticle][1]; ?> €</td>
    <td><?php echo $quantity*$articles[$idArticle][1]; ?> €</td>
    <td><?php echo round($quantity*$articles[$idArticle][1]/1.2,2);?> €</td>
    </tr>
    <?php
    }
    ?>
    </table>
    <section class="text-center my-2">
        <a href="?page=cart&type=empty" class="btn btn-primary">Vider le panier</a>
    </section>