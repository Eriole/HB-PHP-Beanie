<?php
namespace Controller;

class LoginController extends AbstractController
{
    protected string $page = 'login';
    public string $pageTitle ='Connexion';
    public function getContent() :array
    {
        return [];
    }
}