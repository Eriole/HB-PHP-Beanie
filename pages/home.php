

<section class="d-flex gap-3 justify-content-center">
<?php
foreach($articles as $key => $article){
    if ($key<3){
        displayCardsArticle($key, $article);
    }
};
?>
</section>

<section class="my-4 text-center">
    <a href="?page=list" class="align-center btn btn-success">Découvrez tous nos produits</a>
</section>



