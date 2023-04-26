<?php 
use Model\Beanie;
//Affichage articles en tableau
function displayArticle(int $key, Beanie $article){
        $color = 'vert';
        if ( $article->getPrix() <= 12 ) { $color='bleu'; }
        ?>
        <tr>
            <td><?php echo $article->getNom();?></td>
            <td class=" <?php echo $color ?> "><?php echo number_format($article->getPrix(), 2);?> €</td>
            <td><?php echo number_format($article->getPrix()/1.2, 2);?> €</td>
            <td><?php echo $article->getDescription();?> </td>
            <td><a href="?page=cart&type=add&quantity=1&id=<?php echo $key ?>" class="btn btn-primary">Ajouter au panier</a></td>
        </tr>
        <?php
    }

//Affichage articles en carte
function displayCardsArticle(int $key, Beanie $article){
    ?>
    <article class="card" style="width: 18rem;">
        <img src="<?php echo $article->getImage();?>" class="card-img-top" alt="bonnet">
        <div class="card-body">
            <h5 class="card-title"><?php echo $article->getNom();?></h5>
            <p class="card-text">Prix TTC : <?php echo number_format($article->getPrix(), 2);?> €</p>
            <p class="card-text">Prix HT : <?php echo number_format($article->getPrix()/1.2, 2);?> €</p>
            <p class="card-text"><?php echo $article->getDescription();?></p>
            <a href="?page=cart&type=add&quantity=1&id=<?php echo $key ?>" class="btn btn-primary">Ajouter au panier</a>
        </div>
    </article>
    <?php
}

//Affichage select de la classe pour filtre
function displayOptionFiltre(int $key, string $valeur, bool $selected){
    echo '<option value="'. $valeur . '"';

    if($selected==true){echo 'selected';} //Ajoute attribut "selected" dans la balise si true

    echo'>' . $valeur . '</option>';
}
