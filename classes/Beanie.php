<?php 
class Beanie
{
    //Constantes
    public const TAILLES=['S', 'M', 'L', 'XL',];
    public const MATIERES=['laine','coton','cachemire','soie',];

    //Propriétés (variables)
    protected string $nom;
    protected float $prix;
    protected string $description;
    protected string $image;

    protected array $tailles=[];
    protected array $matieres=[];
    //Méthodes (Set et Get)
	/**
	 * @return string
	 */
	public function getNom(): string {
		return $this->nom;
	}
	
	/**
	 * @param string $nom 
	 * @return self
	 */
	public function setNom(string $nom): self {
		$this->nom = $nom;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getPrix(): float {
		return $this->prix;
	}
	
	/**
	 * @param float $prix 
	 * @return self
	 */
	public function setPrix(float $prix): self {
		$this->prix = $prix;
		return $this;
	}
    

	/**
	 * @return string
	 */
	public function getDescription(): string {
		return $this->description;
	}
	
	/**
	 * @param string $description 
	 * @return self
	 */
	public function setDescription(string $description): self {
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getImage(): string {
		return $this->image;
	}
	
	/**
	 * @param string $image 
	 * @return self
	 */
	public function setImage(string $image): self {
		$this->image = $image;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getTailles(): array {
		return $this->tailles;
	}
	
	/**
	 * @param array $tailles 
	 * @return self
	 */
	public function setTailles(array $tailles): self {
		$this->tailles = $tailles;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getMatieres(): array {
		return $this->matieres;
	}
	
	/**
	 * @param array $matieres 
	 * @return self
	 */
	public function setMatieres(array $matieres): self {
		$this->matieres = $matieres;
		return $this;
	}
}