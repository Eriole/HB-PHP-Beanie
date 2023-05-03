<?php
namespace Controller;
use PDO;
use PDOException;
abstract class AbstractController 
{
    protected string $page = 'home';
    protected string $pageTitle = 'Accueil';

    protected PDO $connection;

    public function __construct()
    {
        $dsn = 'mysql:dbname=exo_beanies;port=3306;host=127.0.0.1';
        $user = 'root'; // Utilisateur par défaut
        $password = ''; // Par défaut, pas de mot de passe sur Wamp

        try {
            $this->connection = new PDO($dsn, $user, $password, [

                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            exit('Connexion échouée : ' . $e->getMessage());
        }
    }
    public function render(){
        ob_start();

        if (isset($_GET['page'])){
            $this->page= $_GET['page'];
        }
        $pageTitle = $this->pageTitle;
        
        include 'includes/head.php';

        extract($this->getContent());
        include 'src/View/'. $this->page .'.php';

        include 'includes/footer.php';
        ob_end_flush();
    }

        abstract public function getContent() :array ;

    
	/**
	 * @return string
	 */
	public function getPageTitle(): string {
		return $this->pageTitle;
	}
	
	/**
	 * @param string $pageTitle 
	 * @return self
	 */
	public function setPageTitle(string $pageTitle): self {
		$this->pageTitle = $pageTitle;
		return $this;
	}
}