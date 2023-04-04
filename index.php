<?php
include 'includes/head.php';

foreach($articles as $key => $article){
    if ($key<3){
        displayCardsArticle($article);
    }
};
?>

<?php 
include 'includes/footer.php';
?>
