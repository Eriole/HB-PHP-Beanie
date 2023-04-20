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

    foreach ($articles as $key => $article) {
        displayArticle($key, $article);
    }

    ?>

</table>