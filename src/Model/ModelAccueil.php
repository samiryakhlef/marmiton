<?php

namespace App\Model;

use PDO;
use App\Database\Database;


class ModelAccueil
{

    protected $id;

    protected $name;

    protected $description;

    protected $ingredient;

    protected $difficulty;

    protected $type;

    const TABLE_NAME = 'entrees';


    // instancie ma connexion à la base de données
    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPDO();
    }


    // je recupère ma base de données
    public function findAll()
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
                ORDER BY id ASC;
        ';

        $pdoStatement = $this->pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);



        return $result;
    }

    public function findByType($type)
    {
        $sql = "SELECT
                `id`
                ,`name`
                ,`description`
                ,`ingredients`
                ,`temps`
                ,`difficulty`
                ,`type`
                FROM " . self::TABLE_NAME . "
                WHERE `type` LIKE :type
                ORDER BY `type` ASC ;
        ";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':type', $type, PDO::PARAM_STR);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public function findById($id)
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
                ORDER BY id ASC;
        ';

        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $pdoStatement->execute();
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    public function create($name)
    {
        $sql = 'INSERT INTO ' . self::TABLE_NAME . '
        `id`
        ,`name`
        ,`description`
        ,`ingredients`
        ,`temps`
        ,`difficulty`
        
        ,`type`
        FROM ' . self::TABLE_NAME . '
        ORDER BY id ASC;
                VALUES
                (:name, :description, :ingredients, :temps, :difficulty, :type)
        ';

        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':name', $name, PDO::PARAM_STR);

        $result = $pdoStatement->execute();

        if (!$result) {
            return false;
        }
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
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

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
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of ingredient
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }

    /**
     * Set the value of ingredient
     *
     * @return  self
     */
    public function setIngredient($ingredient)
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    /**
     * Get the value of difficulty
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * Set the value of difficulty
     *
     * @return  self
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
