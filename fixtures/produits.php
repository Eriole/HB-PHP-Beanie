<?php
spl_autoload_register(function ($class) { 
    require_once "../classes/$class.php";
});

require_once '../includes/variables.php';
require_once '../includes/config.inc.php';

//Vider les tables
$connection->exec("SET foreign_key_checks = 0;
    TRUNCATE TABLE beanie;
    TRUNCATE TABLE beanie_matiere;
    TRUNCATE TABLE beanie_taille;
    TRUNCATE TABLE matiere;
    TRUNCATE TABLE taille;
    SET foreign_key_checks = 1");
//INSERT INTO la table Taille
$insertTaille="INSERT INTO taille (taille_nom) VALUES (:nom)";
$statement = $connection->prepare($insertTaille);
$tailles = [];

foreach (Beanie::TAILLES as $taille) {
    $statement->bindValue(':nom', $taille, PDO::PARAM_STR);
    $statement->execute();
    $idTaille=$connection->lastInsertId();
    $tailles[$taille]=$idTaille;
}

//INSERT INTO la table Matiere
$insertMatiere="INSERT INTO matiere (matiere_nom) VALUES (:nom)";
$statement = $connection->prepare($insertMatiere);
$matieres = [];

foreach (Beanie::MATIERES as $matiere) {
    $statement->bindValue(':nom', $matiere, PDO::PARAM_STR);
    $statement->execute();
    $idMatiere=$connection->lastInsertId();
    $matieres[$matiere]=$idMatiere;
}

//INSERT INTO la table Beanie
$insertArticle="INSERT INTO beanie (beanie_prix, beanie_description, beanie_image, beanie_nom) 
VALUES (:prix, :description, :image, :nom)";
$statement = $connection->prepare($insertArticle);
foreach($articles as $article){
    $statement->bindValue(':prix', $article->getPrix(), PDO::PARAM_INT);
    $statement->bindValue(':description', $article->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(':image', $article->getImage(), PDO::PARAM_STR);
    $statement->bindValue(':nom', $article->getNom(), PDO::PARAM_STR);
    $statement->execute();
    $idArticle=$connection->lastInsertId();
    
    //INSERT INTO la table Beanie_Taille
    foreach($article->getTailles() as $taille){
        $insertBeanieTaille="INSERT INTO beanie_taille (beanie_id, taille_id) 
        VALUES (:beanieId, :tailleId)";
        $statementBT = $connection->prepare($insertBeanieTaille);
        $statementBT->bindValue(':beanieId', $idArticle, PDO::PARAM_INT);
        $statementBT->bindValue(':tailleId', $tailles[$taille], PDO::PARAM_INT);
        $statementBT->execute();
    }
    
    //INSERT INTO la table Beanie_Matiere
    foreach($article->getMatieres() as $matiere){
        $insertBeanieMatiere="INSERT INTO beanie_matiere (beanie_id, matiere_id) 
        VALUES (:beanieId, :matiereId)";
        $statementBM = $connection->prepare($insertBeanieMatiere);
        $statementBM->bindValue(':beanieId', $idArticle, PDO::PARAM_INT);
        $statementBM->bindValue(':matiereId', $matieres[$matiere], PDO::PARAM_INT);
        $statementBM->execute();
    }
}