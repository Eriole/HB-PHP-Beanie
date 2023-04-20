<?php     
$articles = [
    (new Beanie())
    ->setNom('bonnet en laine')
    ->setPrix(10)
    ->setDescription('Lorem ipsum dolor sit amet.')
    ->setImage('img/bonnet_creme.jpg')
    ->setTailles(['L','XL',])
    ->setMatieres(['laine',]),
    (new Beanie())
    ->setNom('bonnet en laine bio')
    ->setPrix(14)
    ->setDescription('Lorem ipsum dolor sit amet.')
    ->setImage('img/bonnet_rouge.jpg')
    ->setTailles(['L','XL','S',])
    ->setMatieres(['laine',]),
    (new Beanie())
    ->setNom('bonnet en laine bio et cachemire')
    ->setPrix(20)
    ->setDescription('Lorem ipsum dolor sit amet.')
    ->setImage('img/bonnet_teal.jpg')
    ->setTailles(['L','M','XL',])
    ->setMatieres(['laine','cachemire',]),
    (new Beanie())
    ->setNom('bonnet arc-en-ciel')
    ->setPrix(12)
    ->setDescription('Lorem ipsum dolor sit amet.')
    ->setImage('img/bonnet_vert.jpg')
    ->setTailles(['L','S',])
    ->setMatieres(['laine','coton',]),
];

// Variables connexion
$userName = null;
$connexionStatus = 'Connexion';
$connexionPage = 'login';

$password = 'toto';