<?php
require_once('./config/autoloadplus.php');
require_once('./config/db.php');

class Employe
{
    private $name;
    private $age;
    private $sexe;
    private $db;


    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }



    public function Examination()
    {
    }

    public function Nettoyage(Enclos $enclos)
    {
        $enclos->cleanUp();
    }

    public function Feed(Animal $animal)
    {
        $animal->Manger();
    }

    public function Awake(Animal $animal)
    {
        $animal->WakeUp();
    }
    public function Empty(Enclos $enclos)
    {
        $enclos->EmptyEnclosure();
    }

    public function Heal(Animal $animal)
    {

        $animal->EtreSoigner();
    }


    public function AjouterAnimaux(Animal $animal)
    {
        $request = $this->db->prepare('INSERT INTO animaux (type,name,nomEspece,poids,taille,age) VALUE(:type,:name,:nomEspece,:poids,:taille,:age)');
        $request->execute([
            'name' => $animal->getName(),
            'type' => $animal->getTYPE(),
            'nomEspece' => $animal->getnomEspece(),
            'poids' => $animal->getPoids(),
            'taille' => $animal->getTaille(),
            'age' => $animal->getAge(),
        ]);
    }

    public function findAllAnimaux()
    {
        $query = $this->db->query('SELECT * FROM animaux');
        $allAnimaux = $query->fetchAll(PDO::FETCH_ASSOC);

        $allAnimauxData = [];

        foreach ($allAnimaux as $data) {
            $animal = new Animal($data);
            array_push($allAnimauxData, $animal);
        }

        return $allAnimauxData;
    }

    public function AjouterEnclos(Enclos $enclos)
    {
        $request = $this->db->prepare('INSERT INTO enclos (typeEnclos,name,cleanliness) VALUE(:typeEnclos,:name,:cleanliness)');
        $request->execute([
            'name' => $enclos->getNom(),
            'typeEnclos' => $enclos->getenclosType(),
            'cleanliness' => $enclos->getcleanliness()
        ]);
    }


    public function findAllEnclos()
    {
        $query = $this->db->query('SELECT * FROM enclos');
        $allEnclos = $query->fetchAll(PDO::FETCH_ASSOC);

        $allEncloslapute = [];

        foreach ($allEnclos as $data) {
            $enclos = new Enclos($data);
            array_push($allEncloslapute, $enclos);
        }

        return $allEncloslapute;
    }

    public function findEnclosById($id)
    {
        $query = $this->db->prepare('SELECT * FROM enclos WHERE id = :id');
        $query->execute([
            "id" => $id
        ]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $enclos = new Enclos($data);

        return $enclos;
    }

    public function MoveAnimalToEnclosure(array $data)
    {

        $query = $this->db->prepare('UPDATE animaux SET enclosId = :enclosId WHERE id = :id');
        $query->execute([
            'enclosId' => $data['enclosId'],
            'id' => $data['id']
        ]);
    }

    public function DisplayAnimalByEnclosId($id)
    {

        $query = $this->db->prepare('SELECT * FROM animaux WHERE enclosId = :id');
        $query->execute([
            'id' => $id
        ]);

        $displayAnimaux = $query->fetchAll(PDO::FETCH_ASSOC);

        $displayAnimauxData = [];

        foreach ($displayAnimaux as $data) {
            $display = new Animal($data);
            array_push($displayAnimauxData, $display);
        }

        return $displayAnimauxData;
    }





    public function Directives()
    {
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
     * Get the value of sexe
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set the value of sexe
     */
    public function setSexe($sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get the value of db
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Set the value of db
     */
    public function setDb($db): self
    {
        $this->db = $db;

        return $this;
    }
}
