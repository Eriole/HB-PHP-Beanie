<?php
    $articles = [
        ['bonnet en laine', 10, 'Lorem ipsum dolor sit amet.'], 
        ['bonnet en laine bio', 14, 'Lorem ipsum dolor sit amet.'], 
        ['bonnet en laine bio et cachemire', 20, 'Lorem ipsum dolor sit amet.'],
        ['bonnet arc-en-ciel', 12, 'Lorem ipsum dolor sit amet.'],
    ];

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
    }
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
    }
?>
</table>

</body>
</html>
