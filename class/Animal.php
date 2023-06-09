<?php


class Animal
{

    private $name;
    private $nomEspece; // propriété qui va stocker son espece.
    private $poids;
    private $id;
    private $taille;
    private $age;
    private $aFaim = 'yes';
    private $dort = 'yes';
    private $malade = 'no';



    public function __construct(array $data)
    {

        if (isset($data['name'])) {
            $this->setName($data['name']);
        }
        if (isset($data['age'])) {
            $this->setAge($data['age']);
        }
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        if (isset($data['poids'])) {
            $this->setPoids($data['poids']);
        }
        if (isset($data['taille'])) {
            $this->setTaille($data['taille']);
        }

        if (isset($data['nomEspece'])) {
            $this->setNomEspece($data['nomEspece']);
        }
    }


    public function Manger()
    {
        if ($this->aFaim == 'yes') {
            $this->aFaim == 'no';

            echo "<p>Nourriture consommer, l'animal cri de joie</p>";
            $this->Crier();
        } else if ($this->aFaim == 'no') {
            echo "<p>l'animal n'a pas faim.</p>";
        }
    }

    public function Crier()
    {
        echo 'Cri d Animal';
    }



    public function EtreSoigner()
    {
        if ($malade = true) {
            $this->$malade = false;
            echo "<p>L'animal à été soigné</p>";
        }
    }

    public function WakeUp()
    {
        if ($this->dort == 'yes') {
            $this->dort == 'no';
            echo "<p>l'animal se fait réveiller, il n'apprécie pas.</p>";
        } else if ($this->dort == 'no') {
            echo "<p>L'animal ne dort pas.</p>";
        }
    }

    public function displayCharacteristics()
    {
        echo "Species: " . $this->nomEspece . "<br>";
        echo "Weight: " . $this->poids . " kg" . "<br>";
        echo "Height: " . $this->taille . " m" . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Is Hungry: " . $this->aFaim . "<br>";
        echo "Is Sleeping: " . $this->dort . "<br>";
        echo "Is Sick: " . $this->malade . "<br>";
    }






    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nomEspece
     */
    public function getNomEspece()
    {
        return $this->nomEspece;
    }

    /**
     * Set the value of nomEspece
     */
    public function setNomEspece($nomEspece): self
    {
        $this->nomEspece = $nomEspece;

        return $this;
    }

    /**
     * Get the value of poids
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set the value of poids
     */
    public function setPoids($poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get the value of taille
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set the value of taille
     */
    public function setTaille($taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get the value of age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     */
    public function setAge($age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of aFaim
     */
    public function getAFaim()
    {
        return $this->aFaim;
    }

    /**
     * Set the value of aFaim
     */
    public function setAFaim($aFaim): self
    {
        $this->aFaim = $aFaim;

        return $this;
    }

    /**
     * Get the value of dort
     */
    public function getDort()
    {
        return $this->dort;
    }

    /**
     * Set the value of dort
     */
    public function setDort($dort): self
    {
        $this->dort = $dort;

        return $this;
    }

    /**
     * Get the value of malade
     */
    public function getMalade()
    {
        return $this->malade;
    }

    /**
     * Set the value of malade
     */
    public function setMalade($malade): self
    {
        $this->malade = $malade;

        return $this;
    }


    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }
}
