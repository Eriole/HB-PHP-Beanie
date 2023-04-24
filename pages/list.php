<?php

$request = $connection->prepare("SELECT beanie_id, beanie_prix, beanie_description, beanie_image, beanie_nom FROM beanie");

// On demande à PDO de nous créer un Beanie avec ce qu'il va récupérer en BdD
$request->setFetchMode( PDO::FETCH_CLASS, Beanie::class);
$request->execute();

// On rempli le tableau avec chaque instance de Beanie
$articles = $request->fetchAll();
foreach($articles as $key => $article){
    //Récupère les données tailles de BDD pour les mettres en tableau dans -setTailles()
    $sousRequestTaille = $connection->prepare("SELECT taille_nom 
        FROM taille
        INNER JOIN beanie_taille ON taille.taille_id = beanie_taille.taille_id
        WHERE beanie_taille.beanie_id = :id");
    $sousRequestTaille->bindValue(':id', $article->getId(), PDO::PARAM_INT);
    $sousRequestTaille->execute();
    $tailles=$sousRequestTaille->fetchAll(PDO::FETCH_COLUMN);
    $article->setTailles($tailles);
    
    //Récupère les données matieres de BDD pour les mettres en tableau dans -setMatieres()
    $sousRequestMatiere = $connection->prepare("SELECT matiere_nom 
        FROM matiere
        INNER JOIN beanie_matiere ON matiere.matiere_id = beanie_matiere.matiere_id
        WHERE beanie_matiere.beanie_id = :id");
    $sousRequestMatiere->bindValue(':id', $article->getId(), PDO::PARAM_INT);
    $sousRequestMatiere->execute();
    $matieres=$sousRequestMatiere->fetchAll(PDO::FETCH_COLUMN);
    $article->setMatieres($matieres);
}

?>

<!-- Filtres -->
<form action="" method="POST" class="my-2">
    <ul class="list-unstyled d-flex space-between w-50 mx-auto align-items-center">
        <li>
            <label for="taille">Taille :</label>
            <select name="taille" id="taille">
                <option value=""></option>
                <?php foreach (Beanie::TAILLES as $key => $taille) {
                    $selected = isset($_POST['taille']) && $_POST['taille'] == $taille; //true si correspond
                    displayOptionFiltre($key, $taille, $selected);
                } ?>
            </select>
        </li>
        <li>
            <label for="matiere">Matière :</label>
            <select name="matiere" id="matiere">
                <option value=""></option>
                <?php foreach (Beanie::MATIERES as $key => $matiere) {
                    $selected = isset($_POST['matiere']) && $_POST['matiere'] == $matiere; //true si correspond
                    displayOptionFiltre($key, $matiere, $selected);
                } ?>
            </select>
        </li>
        <li>
            <label>Prix entre :</label>
            <input type="number" name="prixMin" id="prixMin" placeholder="Prix min" class="w-25"
                value="<?php if (isset($_POST['prixMin'])) {echo $_POST['prixMin'];} ?>">
            <input type="number" name="prixMax" id="prixMax" placeholder="Prix max" class="w-25"
                value="<?php if (isset($_POST['prixMax'])) { echo $_POST['prixMax'];} ?>">
        </li>
        <li>
            <input type="submit" value="Filtrer" class="btn btn-light">
        </li>
    </ul>
</form>

<!-- Affichage -->
<table class="my-5 w-50 m-auto table table-bordered border-primary">
    <tr class="text-center">
        <th>Article</th>
        <th>Prix (TTC)</th>
        <th>Prix (TVA)</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    <?php
    //Filtre des articles
    if(!empty($_POST)){
        $filtres = new BeanieFilter($_POST);
        $articles = $filtres->filtrage($articles);
    }
    //Affichage du tableau
    foreach ($articles as $key => $article) {
        displayArticle($key, $article);
    }

    ?>

</table>