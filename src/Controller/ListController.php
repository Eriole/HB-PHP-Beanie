<?php
namespace Controller;
use Model\Beanie;
use PDO;

class ListController extends AbstractController
{
    public string $page ='list';
    public function getContent() :array
    {
        $request = $this->connection->prepare("SELECT beanie_id, beanie_prix, beanie_description, beanie_image, beanie_nom FROM beanie");

        // On demande à PDO de nous créer un Beanie avec ce qu'il va récupérer en BdD
        $request->setFetchMode( PDO::FETCH_CLASS, Beanie::class);
        $request->execute();
        
        // On rempli le tableau avec chaque instance de Beanie
        $articles = $request->fetchAll();
        foreach($articles as $key => $article){
            //Récupère les données tailles de BDD pour les mettres en tableau dans -setTailles()
            $sousRequestTaille = $this->connection->prepare("SELECT taille_nom 
                FROM taille
                INNER JOIN beanie_taille ON taille.taille_id = beanie_taille.taille_id
                WHERE beanie_taille.beanie_id = :id");
            $sousRequestTaille->bindValue(':id', $article->getId(), PDO::PARAM_INT);
            $sousRequestTaille->execute();
            $tailles=$sousRequestTaille->fetchAll(PDO::FETCH_COLUMN);
            $article->setTailles($tailles);
            
            //Récupère les données matieres de BDD pour les mettres en tableau dans -setMatieres()
            $sousRequestMatiere = $this->connection->prepare("SELECT matiere_nom 
                FROM matiere
                INNER JOIN beanie_matiere ON matiere.matiere_id = beanie_matiere.matiere_id
                WHERE beanie_matiere.beanie_id = :id");
            $sousRequestMatiere->bindValue(':id', $article->getId(), PDO::PARAM_INT);
            $sousRequestMatiere->execute();
            $matieres=$sousRequestMatiere->fetchAll(PDO::FETCH_COLUMN);
            $article->setMatieres($matieres);
        }
        return [
            'articles' => $articles,
        ];
    }
}