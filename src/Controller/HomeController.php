<?php
namespace Controller;
use Model\Beanie;
use PDO;

class HomeController extends AbstractController
{
    public string $page='home';
    public string $pageTitle ='Accueil';

    public function getContent() :array
    {
        $request = $this->connection->prepare("SELECT beanie_id, beanie_prix, beanie_description, beanie_image, beanie_nom FROM beanie");

        // On demande à PDO de nous créer un Beanie avec ce qu'il va récupérer en BdD
        $request->setFetchMode( PDO::FETCH_CLASS, Beanie::class);
        $request->execute();

        // On rempli le tableau avec chaque instance de Beanie
        $articles = $request->fetchAll();
        return [
            'articles' => $articles,
        ];
    }
}