<?php
class BeanieFilter 
{
    //Propriétés
    protected array $tableauFiltre = [];
    protected int $prixMin;
    protected int $prixMax;
    protected string $taille;
    protected string $matiere;

    //Constructeur
    public function __construct($formulaire)
    {
        $this->prixMin=intval($formulaire['prixMin']);
        $this->prixMax=intval($formulaire['prixMax']);
        $this->taille=$formulaire['taille'];
        $this->matiere=$formulaire['matiere'];
    }

    //Filtrage des données
    protected function apply($tableauArticle): array
    {
        if ($this->prixMin) {
            $tableauArticle = array_filter($tableauArticle, function($article) {
                return $article->getPrix()>=$this->prixMin;
            });
        }
        if ($this->prixMax) {
            $tableauArticle = array_filter($tableauArticle, function($article) {
                return $article->getPrix()<=$this->prixMax;
            });
        }
        if ($this->taille) {
            $tableauArticle =  array_filter($tableauArticle, function($article) {
                return in_array($this->taille, $article->getTailles());
            });
        }
        if ($this->matiere) {
            $tableauArticle = array_filter($tableauArticle, function($article) {
                return in_array($this->matiere, $article->getMatieres());
            });
        }

        return $tableauArticle;
    }

    //Application du filtre
    public function filtrage($tableauFiltre): array 
    {
        return $this->apply($tableauFiltre);
    }

}