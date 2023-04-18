<?php
//Initialisation
if(isset($_SESSION['cart'])){
    $cart=$_SESSION['cart'];
}else{
    $cart=[];
}

// Ajout au panier
if(isset($_GET['id']) && isset($_GET['quantity']) && $_GET['type']==='add'){
    $id=$_GET['id'];
    if(empty($cart[$id])){$cart[$id]= 0;}
    $cart[$id] += $_GET['quantity'];
    $_SESSION['cart'] = $cart;
    header('Location: ?page=cart');
}

// Vider le panier
if(isset($_GET['type']) && $_GET['type']==='empty'){
    $cart = [];
    $_SESSION['cart'] = $cart;
    header('Location: ?page=cart');
}

// Retirer une quantité
if(isset($_GET['type']) && $_GET['type']==='remove'){
    $id=$_GET['id'];
    $cart[$id] -= $_GET['quantity'];
    if($cart[$id]<=0){
        unset($cart[$id]);
    }
    $_SESSION['cart'] = $cart;
    header('Location: ?page=cart');
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
        $prixTotal=0;
    if(!empty($cart)){ //affichage panier plein
        foreach($cart as $idArticle => $quantity){
            ?>
            <tr>
            <td><?php echo $articles[$idArticle]->getNom(); ?></td>
            
            <td class="text-center"><a href="?page=cart&type=add&quantity=1&id=<?php echo $idArticle ?>"><i class="fa-solid fa-plus mx-2"></i></a>
                <?php echo $quantity; ?>
                <a href="?page=cart&type=remove&quantity=1&id=<?php echo $idArticle ?>"><i class="fa-solid fa-minus mx-2"></i></a>
            </td>
            <td><?php echo $articles[$idArticle]->getPrix(); ?> €</td>
            <td><?php echo $quantity*$articles[$idArticle]->getPrix();
            $prixTotal+=$quantity*$articles[$idArticle]->getPrix(); ?> €</td>
            <td><?php echo round($quantity*$articles[$idArticle]->getPrix()/1.2,2);?> €</td>
            </tr>
            <?php 
        }
    }else{ '<tr><td colspan="5" class="text-center">Panier vide</td></tr>';} //affichage panier vide
            ?>
            <tr>
                <td colspan="3">Total : </td>
                <td><?php echo $prixTotal; ?> €</td>
                <td><?php echo round($prixTotal/1.2,2); ?> €</td>
            </tr>
    </table>
    <section class="text-center my-2">
        <a href="?page=cart&type=empty" class="btn btn-secondary">Vider le panier</a>
    </section>