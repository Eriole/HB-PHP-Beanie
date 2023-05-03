<?php
namespace Model ;
class Contact
{
    // Propriétés
    protected string $userFirstName='';
    protected string $userMail='';
    protected string $userSujet='';
    protected string $userMsg='';
    
    //Constructeur
    public function __construct(?array $formulaire = []) 
    {
        if(isset($formulaire['firstname'])){$this->userFirstName = trim($formulaire['firstname']);}
        if(isset($formulaire['mail'])){$this->userMail = trim($formulaire['mail']);}
        if(isset($formulaire['sujet'])){$this->userSujet = trim($formulaire['sujet']);}
        if(isset($formulaire['msg'])){$this->userMsg = trim($formulaire['msg']);}
    }

    //Get et Set
	/**
	 * @return string
	 */
	public function getUserFirstName(): string {
		return $this->userFirstName;
	}
	
	/**
	 * @param string $userFirstName 
	 * @return self
	 */
	public function setUserFirstName(string $userFirstName): self {
		$this->userFirstName = $userFirstName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUserMail(): string {
		return $this->userMail;
	}
	
	/**
	 * @param string $userMail 
	 * @return self
	 */
	public function setUserMail(string $userMail): self {
		$this->userMail = $userMail;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUserSujet(): string {
		return $this->userSujet;
	}
	
	/**
	 * @param string $userSujet 
	 * @return self
	 */
	public function setUserSujet(string $userSujet): self {
		$this->userSujet = $userSujet;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUserMsg(): string {
		return $this->userMsg;
	}
	
	/**
	 * @param string $userMsg 
	 * @return self
	 */
	public function setUserMsg(string $userMsg): self {
		$this->userMsg = $userMsg;
		return $this;
	}

    //methode
    public function Validate()
	{
        $erreurs=[];
        // Vérification des erreurs
        if (empty($this->userFirstName)){
            $erreurs['firstname']=true;
        }
        if (!filter_var($this->userMail, FILTER_VALIDATE_EMAIL) || empty($this->userMail)){
            $erreurs['mail']=true;
        }
        if (empty($this->userSujet)){
            $erreurs['sujet']=true;
        }
        if (empty($this->userMsg)){
            $erreurs['msg']=true;
        }
        return $erreurs;
    }
}