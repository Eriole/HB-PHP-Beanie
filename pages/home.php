

<section class="d-flex gap-3 justify-content-center">
<?php
$request = $connection->prepare("SELECT beanie_id, beanie_prix, beanie_description, beanie_image, beanie_nom FROM beanie");

// On demande à PDO de nous créer un Beanie avec ce qu'il va récupérer en BdD
$request->setFetchMode( PDO::FETCH_CLASS, Beanie::class);
$request->execute();

// On rempli le tableau avec chaque instance de Beanie
$articles = $request->fetchAll();

foreach($articles as $key => $article){
    if ($key>=3){
        break;
    }
        displayCardsArticle($key, $article);
};
?>
</section>

<section class="my-4 text-center">
    <a href="?page=list" class="align-center btn btn-success">Découvrez tous nos produits</a>
</section>



