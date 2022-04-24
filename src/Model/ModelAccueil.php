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

    protected $nb_articles;

    public const TABLE_NAME = 'entrees';


    // instancie ma connexion à la base de données
    /**
     * @var null
     */
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
        $sql = 'SELECT  
                `id`
                ,`name`
                ,`description`
                ,`ingredients`
                ,`temps`
                ,`difficulty`
                ,`type`
                FROM ' . self::TABLE_NAME . '
                WHERE id = :id';

        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();
        return $pdoStatement->fetchObject(self::class);
    }

    // je créer ma BDD par name
    public function create($id, $name, $description, $ingredient, $difficulty, $type)
    {
        $sql = 'INSERT INTO ' . self::TABLE_NAME . ' (id, name, description, ingredients, temps, difficulty, type)
                VALUES (:id, :name, :description, :ingredients, :temps, :difficulty, :type)';

        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':name', $name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':description', $description, PDO::PARAM_STR);
        $pdoStatement->bindValue(':ingredients', $ingredient, PDO::PARAM_STR);
        $pdoStatement->bindValue(':temps', $difficulty, PDO::PARAM_STR);
        $pdoStatement->bindValue(':difficulty', $difficulty, PDO::PARAM_STR);
        $pdoStatement->bindValue(':type', $type, PDO::PARAM_STR);
        $pdoStatement->execute();
        return $pdoStatement;

    }

    // j'efface les données de ma table 
    public function delete($id)
    {
        $sql = 'DELETE FROM ' . self::TABLE_NAME . ' WHERE id = :id';

        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        return $pdoStatement->execute();
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
     * @param $name
     * @return  self
     */
    public function setName($name): static
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

    /**
     * Get the value of nb_articles
     */
    public function getNb_articles()
    {
        return $this->nb_articles;
    }

    /**
     * Set the value of nb_articles
     *
     * @return  self
     */
    public function setNb_articles($nb_articles)
    {
        $this->nb_articles = $nb_articles;

        return $this;
    }
}
