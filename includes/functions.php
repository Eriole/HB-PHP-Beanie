<?php 
function displayArticle(array $article){
        $color = 'vert';
        if ( $article[1] <= 12 ) { $color='bleu'; }
        ?>
        <tr>
            <td><?php echo $article[0];?></td>
            <td class=" <?php echo $color ?> "><?php echo number_format($article[1], 2);?> €</td>
            <td><?php echo number_format($article[1]/1.2, 2);?> €</td>
            <td><?php echo $article[2];?> </td>
        </tr>
        <?php
    };

function displayCardsArticle(array $article){
    ?>
    <div class="card" style="width: 18rem;">
        <img src="<?php echo $article[3];?>" class="card-img-top" alt="bonnet">
        <div class="card-body">
            <h5 class="card-title"><?php echo $article[0];?></h5>
            <p class="card-text">Prix TTC : <?php echo number_format($article[1], 2);?> €</p>
            <p class="card-text">Prix HT : <?php echo number_format($article[1]/1.2, 2);?> €</p>
            <p class="card-text"><?php echo $article[2];?></p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <?php
};