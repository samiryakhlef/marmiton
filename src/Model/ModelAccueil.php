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
    public $type;
    public $created_at;
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
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // je récupère par ma BBD par ID
    public function findById($id)
    {
        $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' WHERE id = :id';
        $query = $this->pdo->prepare($sql);
        $result = $query->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }
    
    public function editRecette($id)
    {
        $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' WHERE id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // je créer une fonction delete qui prend en paramètre l'id de la recette à supprimer
    public function delete($id)
    {
        $sql = 'DELETE FROM ' . self::TABLE_NAME . ' WHERE id = :id';
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query;
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
                ,`created_at`

                FROM ' . self::TABLE_NAME . '
                WHERE type = :type;
        ';
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':type', $type, PDO::PARAM_STR);
        $pdoStatement->execute();
        return $pdoStatement;
    }

    //je créer un fonction pour compter les pages courantes 
    public function findByPage($page, $order, $research,$type)
    {   // On détermine le nombre d'articles par page
        $parPage = 10;

        $pageDebut = ($page - 1) * $parPage;

        if ($order == 1) {
            $order = 'DESC';
        } else {
            $order = 'ASC';
        }
        
        if($type == 1){
            $type = 'entrer';
        }if($type == 2){
            $type = 'plats';
        }if($type == 3){
            $type = 'desserts';
        }

        if ($research != null) {
            $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' 
            WHERE type LIKE "%' . $research . '%" OR name LIKE "%' . $research . '%" OR ingredients LIKE "%' . $research . '%"
            ORDER BY `id` ' . $order;
        }elseif ($type != null) {
            $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' 
            WHERE type LIKE "%' . $type . '%"
            ORDER BY `id` ' . $order;
        }else {
            $sql = 'SELECT
                `id`
                ,`name`
                ,`description`
                ,`ingredients`
                ,`temps`
                ,`difficulty`
                ,`type`
                ,`created_at`
                FROM ' . self::TABLE_NAME . '
                ORDER BY `id` ' . $order . '
                LIMIT ' . $pageDebut . ',' . $parPage;
        }
    
        $pdoStatement = $this->pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }


    // je créer une fonction pour compter le nombre de ligne dans ma table
    public function countPage($research)
    {
        $parPage = 10;

        // On détermine le nombre total d'articles
        $sql = 'SELECT COUNT(*) AS count FROM ' . self::TABLE_NAME . ' WHERE name LIKE "%' . $research . '%" OR type LIKE "%' . $research . '%" OR difficulty LIKE "%' . $research . '%"';
        // $sql = 'SELECT COUNT(*) AS count FROM ' . self::TABLE_NAME . ' WHERE titre LIKE "%' . $research . '%" OR genre LIKE "%' . $research . '%" OR acteurs LIKE "%' . $research . '%"';

        // On prépare la requête
        $query = $this->pdo->prepare($sql);

        // On exécute
        $query->execute();

        // On récupère le nombre d'articles
        $total = $query->fetch();
        $total = $total['count'];

        // On calcule le nombre de pages total
        return ceil($total / $parPage);
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
     * Get the value of temps
     */ 
    public function getTemps()
    {
        return $this->temps;
    }

    /**
     * Set the value of temps
     *
     * @return  self
     */ 
    public function setTemps($temps)
    {
        $this->temps = $temps;

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
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }
}
