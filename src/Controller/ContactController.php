<?php
namespace Controller;
use Model\Contact;
use PDO;

class ContactController extends AbstractController
{
    protected string $page = 'contact';
    public string $pageTitle ='Ecrivez-nous';
    public function getContent() :array
    {
        // Stockage des erreurs
        $erreurs=[];
        $message=new Contact();

        if(!empty($_POST)){
            $message=new Contact($_POST);
            $erreurs=$message->validate();
    
            if(empty($erreurs)){
                //INSERT INTO la table contact
                $insertMessage="INSERT INTO contact (contact_email, contact_message, contact_nom, contact_sujet) 
                VALUES (:email, :message, :nom, :sujet)";
                $statement = $this->connection->prepare($insertMessage);
                
                $statement->bindValue(':email', $message->getUserMail(), PDO::PARAM_STR);
                $statement->bindValue(':message', $message->getUserMsg(), PDO::PARAM_STR);
                $statement->bindValue(':nom', $message->getUserFirstName(), PDO::PARAM_STR);
                $statement->bindValue(':sujet', $message->getUserSujet(), PDO::PARAM_STR);
                $statement->execute();

                //redirection si succès
                header('Location: ?page=contact&send=1');
            }
        }
        return [
            'erreurs' => $erreurs,
            'message' => $message,
        ];
    }
}