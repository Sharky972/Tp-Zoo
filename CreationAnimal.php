<?php

require_once('./config/autoloadplus.php');
require_once('./config/db.php');

if (isset($_POST['name']) && isset($_POST['nomEspece']) && isset($_POST['poids']) && isset($_POST['taille']) && isset($_POST['age'])) {
    $Employe = new Employe($db);


    // récupération du nom du héros et du personnage choisi : 
    $data = [
        'type' => $_POST['type'],
        'name' => $_POST['name'],
        'nomEspece' => $_POST['nomEspece'],
        'poids' => $_POST['poids'],
        'taille' => $_POST['taille'],
        'age' => $_POST['age'],
    ];


    // création d'une instance de la classe correspondant au personnage choisi
    switch ($_POST['nomEspece']) {
        case 'ours':
            $ours = new Ours($data);
            $Employe->AjouterAnimaux($ours);

            header('location: AddAnimal.php');
            break;

        case 'requin':
            $requin = new Requin($data);
            $Employe->AjouterAnimaux($requin);

            header('location: AddAnimal.php');
            break;
        case 'tigre':
            $tigre = new Tigre($data);
            $Employe->AjouterAnimaux($tigre);

            header('location: AddAnimal.php');
            break;
        case 'aigle':
            $aigle = new Aigle($data);
            $Employe->AjouterAnimaux($aigle);

            header('location: AddAnimal.php');
            break;
    }
}
