<?php
namespace Controller;
use Model\Cart;
use Model\Beanie;
use PDO;

class CartController extends AbstractController
{
    public string $page ='cart';

    public function getContent() :array
    {
        $request = $this->connection->prepare("SELECT beanie_id, beanie_prix, beanie_description, beanie_image, beanie_nom FROM beanie");

        // On demande à PDO de nous créer un Beanie avec ce qu'il va récupérer en BdD
        $request->setFetchMode( PDO::FETCH_CLASS, Beanie::class);
        $request->execute();
        
        // On rempli le tableau avec chaque instance de Beanie
        $articles = $request->fetchAll();
        
        $cart = new Cart();
        
        if(isset($_GET['id']) && isset($_GET['quantity']) && $_GET['type']==='add'){
            $cart->add($_GET['id'],$_GET['quantity']);
        }
        
        if(isset($_GET['type']) && $_GET['type']==='empty'){
            $cart->empty($_GET['id'],$_GET['quantity']);
        }
        
        if(isset($_GET['type']) && $_GET['type']==='remove'){
            $cart->remove($_GET['id'],$_GET['quantity']);
        }
        return [
            'cart' => $cart,
            'articles' => $articles,
        ];
    }

}