<?php
include 'functions.php';
include 'variables.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bonnets</title>
</head>
<body>
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

</body>
</html>
