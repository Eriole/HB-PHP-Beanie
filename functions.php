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