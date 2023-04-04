<?php
include 'includes/head.php';
?>


    <table>
        <tr>
            <th>Article</th>
            <th>Prix (TTC)</th>
            <th>Prix (TVA)</th>
            <th>Description</th>
        </tr>
<?php
    foreach($articles as $key => $article){
        displayArticle($article);
    };
?>
</table>

<?php 
include 'includes/footer.php';
?>
