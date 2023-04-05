<?php
include 'includes/head.php';
?>

<section class="d-flex gap-3 justify-content-center">
<?php
foreach($articles as $key => $article){
    if ($key<3){
        displayCardsArticle($article);
    }
};
?>
</section>

<section class="my-2 text-center">
    <a href="list.php" class="align-center btn btn-info">Découvrez tous nos produits</a>
</section>


<?php 
include 'includes/footer.php';
?>
