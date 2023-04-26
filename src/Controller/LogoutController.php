<?php
namespace Controller;

class LogoutController extends AbstractController
{
    protected string $page = 'logout';
    public function getContent() :array
    {
        session_start();
        session_destroy();

        header('Location: ?disconnected=1');
        return [];
    }
}