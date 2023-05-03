<?php 

namespace Model ;
class Beanie
{
    //Constantes
    public const TAILLES=['S', 'M', 'L', 'XL',];
    public const MATIERES=['laine','coton','cachemire','soie',];

    //Propriétés (variables)
    protected ?int $beanie_id=null;
    protected string $beanie_nom;
    protected float $beanie_prix;
    protected string $beanie_description;
    protected string $beanie_image;
    protected array $tailles=[];
    protected array $matieres=[];
    //Méthodes (Set et Get)
	/**
	 * @return string
	 */
	public function getNom(): string {
		return $this->beanie_nom;
	}
	
	/**
	 * @param string $nom 
	 * @return self
	 */
	public function setNom(string $nom): self {
		$this->beanie_nom = $nom;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getPrix(): float {
		return $this->beanie_prix;
	}
	
	/**
	 * @param float $prix 
	 * @return self
	 */
	public function setPrix(float $prix): self {
		$this->beanie_prix = $prix;
		return $this;
	}
    

	/**
	 * @return string
	 */
	public function getDescription(): string {
		return $this->beanie_description;
	}
	
	/**
	 * @param string $description 
	 * @return self
	 */
	public function setDescription(string $description): self {
		$this->beanie_description = $description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getImage(): string {
		return $this->beanie_image;
	}
	
	/**
	 * @param string $image 
	 * @return self
	 */
	public function setImage(string $image): self {
		$this->beanie_image = $image;
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

	/**
	 * @return int|null
	 */
	public function getId(): ?int {
		return $this->beanie_id;
	}
	
	/**
	 * @param int|null $beanie_id 
	 * @return self
	 */
	public function setId(?int $id): self {
		$this->beanie_id = $id;
		return $this;
	}
}