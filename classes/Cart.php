<?php
class Cart {

    //Propriété
    protected array $contenu = [];

    //Constructeur
    public function __construct(){
        if(isset($_SESSION['cart'])){
            $this->contenu=$_SESSION['cart'];
        }else{
            $this->contenu=[];
        }
    }

    //Methodes
    // Ajout au panier
    public function add($id, $quantity = 1) {
        if(empty($this->contenu[$id])){$this->contenu[$id]= 0;}
        $this->contenu[$id] += $quantity;
        $_SESSION['cart'] = $this->contenu;
        $this->locationCart();
    }

    // Vider le panier
    public function empty($id, $quantity = 1) {
        $this->contenu = [];
        $_SESSION['cart'] = $this->contenu;
        $this->locationCart();
    }

    // Retirer une quantité
    public function remove($id, $quantity = 1){
        $this->contenu[$id] -= $quantity;
        if($this->contenu[$id]<=0){
            unset($this->contenu[$id]);
        }
        $_SESSION['cart'] = $this->contenu;
        $this->locationCart();
    }
    
    public function locationCart(){
        header('Location: ?page=cart');
    }

	/**
	 * @return array
	 */
	public function getContenu(): array {
		return $this->contenu;
	}
	
	/**
	 * @param array $contenu 
	 * @return self
	 */
	public function setContenu(array $contenu): self {
		$this->contenu = $contenu;
		return $this;
	}
}
