<?php

namespace App\Model;

use PDO;
use App\Database\Database;


class ModelAccueil
{
    public $id;
    public $name;
    public $description;
    public $ingredient;
    public $difficulty;
    public $temps;
    public $type;
    public const TABLE_NAME = 'entrees';

    // instancie ma connexion à la base de données

    private $pdo;

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPDO();
    }


    // je récupère toute ma base de données
    public function findAll()
    {
        $sql = 'SELECT * FROM ' . self::TABLE_NAME;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // je récupère par ma BBD par ID
    public function findById($id)
    {
        $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' WHERE id = :id';
        $query = $this->pdo->prepare($sql);
        $query->execute([`id` => $id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    

    // je créer une fonction create pour update en base de données
    public function create($id, $name, $description, $ingredient, $difficulty, $type)
    {
        $sql = 'INSERT INTO ' . self::TABLE_NAME . ' (id=?, name, description, ingredient, difficulty, type) VALUES (:id, :name, :description, :ingredient, :difficulty, :type)';
        $query = $this->pdo->prepare($sql);
        $query->execute([
            `id` => $id, 
            `name` => $name, 
            `description` => $description, 
            `ingredient` => $ingredient, 
            `difficulty` => $difficulty, 
            `type` => $type
        ]);
    }
    // {
    //     $sql = 'INSERT INTO ' . self::TABLE_NAME . ' (id, name, description, ingredients, temps, difficulty, type)
    //             VALUES (:id, :name, :description, :ingredients, :temps, :difficulty, :type)';

    //     $pdoStatement = $this->pdo->prepare($sql);
    //     $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
    //     $pdoStatement->bindValue(':name', $name, PDO::PARAM_STR);
    //     $pdoStatement->bindValue(':description', $description, PDO::PARAM_STR);
    //     $pdoStatement->bindValue(':ingredients', $ingredient, PDO::PARAM_STR);
    //     $pdoStatement->bindValue(':temps', $difficulty, PDO::PARAM_STR);
    //     $pdoStatement->bindValue(':difficulty', $difficulty, PDO::PARAM_STR);
    //     $pdoStatement->bindValue(':type', $type, PDO::PARAM_STR);
    //     $pdoStatement->execute();
    //     return $pdoStatement;

    // }

    // j'efface les données de ma table 
    public function delete($id)
    {
        $sql = 'DELETE FROM ' . self::TABLE_NAME . ' WHERE id = :id';
        $query = $this->pdo->prepare($sql);
        $query->execute([`id` => $id]);
    }

    // je créer ma bdd par type
    public function findByType($type)
    {
        $sql = 'SELECT
                `id`
                ,`name`
                ,`description`
                ,`ingredients`
                ,`temps`
                ,`difficulty`
                ,`type`
                FROM ' . self::TABLE_NAME . '
                WHERE type = :type
                ORDER BY id;
        ';

        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':type', $type, PDO::PARAM_STR);
        $pdoStatement->execute();
        return $pdoStatement->fetchObject(self::class);
    }

}
