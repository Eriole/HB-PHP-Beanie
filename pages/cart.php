<?php
$request = $connection->prepare("SELECT beanie_id, beanie_prix, beanie_description, beanie_image, beanie_nom FROM beanie");

// On demande à PDO de nous créer un Beanie avec ce qu'il va récupérer en BdD
$request->setFetchMode( PDO::FETCH_CLASS, Beanie::class);
$request->execute();

// On rempli le tableau avec chaque instance de Beanie
$articles = $request->fetchAll();

$cart = new Cart();

if(isset($_GET['id']) && isset($_GET['quantity']) && $_GET['type']==='add'){
    $cart->add($_GET['id'],$_GET['quantity']);
}

if(isset($_GET['type']) && $_GET['type']==='empty'){
    $cart->empty($_GET['id'],$_GET['quantity']);
}

if(isset($_GET['type']) && $_GET['type']==='remove'){
    $cart->remove($_GET['id'],$_GET['quantity']);
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
        if(!empty($cart->getContenu())){ //affichage panier plein
            foreach($cart->getContenu() as $idArticle => $quantity){
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
    }else{ echo '<tr><td colspan="5" class="text-center">Panier vide</td></tr>';} //affichage panier vide
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