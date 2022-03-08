<?php

namespace App\Model;

use PDO;
use App\Database\Database;

class ModelAccueil
{
    protected $id;

    protected $categorie;

    protected $pdo;

    const TABLE_NAME = 'recette';

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPDO();
    }

    public function findAll()
    {
        $sql = 'SELECT
                `id`
                ,`categorie`
                ,`ingredients`
                ,`sort`
                ,`etape`
                ,`temps_prepare`
                ,`difficulte`
                FROM ' . self::TABLE_NAME . '
                ORDER BY `id` ASC;
        ';

        $pdoStatement = $this->pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public function findById($id)
    {
        $sql = 'SELECT
                `id`
                `categorie`
                ,`ingredients`
                ,`sort`
                ,`etape`
                ,`temps_prepare`
                ,`difficulte`
                FROM ' . self::TABLE_NAME . '
                WHERE `id` = :id
                ORDER BY `id` ASC;
        ';

        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $pdoStatement->execute();
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    public function create($categorie)
    {
        $sql = 'INSERT INTO ' . self::TABLE_NAME . '
        `categorie`
        ,`ingredients`
        ,`sort`
        ,`etape`
        ,`temps_prepare`
        ,`difficulte`
                VALUES
                (:categorie,:ingredients,:sort,:etape,:temps_prepare, :difficulte)
        ';

        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':categorie',$categorie, PDO::PARAM_STR);
        
        $result = $pdoStatement->execute();
        
        if (!$result) {
            return false;
        }
    }
}