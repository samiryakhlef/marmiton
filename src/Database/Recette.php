<?php

namespace App\Database;

use PDO;
use App\Database\Database;


class Recette
{
    // instancie ma connexion à la base de données
    private $pdo;
    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPDO();
    }

    //je créer une fonction pour ajouter une recette en base de données
    public function addRecette($name, $description, $ingredients, $difficulty, $type, $temps)
    {
        $statement = $this->pdo->prepare('INSERT INTO entrees (`name`, `description`, `ingredients`, `difficulty`, `type`, `temps`) VALUES (:name, :description, :ingredients, :difficulty, :type, :temps)');

        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':ingredients', $ingredients, PDO::PARAM_STR);
        $statement->bindParam(':temps', $temps, PDO::PARAM_STR);
        $statement->bindParam(':difficulty', $difficulty, PDO::PARAM_STR);
        $statement->bindParam(':type', $type, PDO::PARAM_STR);
        $statement->execute();
        return $statement;
    }
}
