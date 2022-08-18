<?php

namespace App\Model;

use PDO;
use App\Database\Database;


class ModelAccueil
{
    public $id;
    public $name;
    public $description;
    public $ingredients;
    public $steps;
    public $difficulty;
    public $type;
    public $temps;
    public $imageName;
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

    //je créer une fonction pour ajouter une recette en base de données
    public function addRecette($name, $description, $ingredients, $difficulty, $type, $temps, $steps, $imageName)
    {
        $statement = $this->pdo->prepare('INSERT INTO `entrees` 
        (`name`, 
        `description`, 
        `ingredients`, 
        `steps`,
        `difficulty`,
        `type`, 
        `temps`,
        `image_name`) VALUES 
        (:name, :description, :ingredients, :steps, :difficulty, :type, :temps, :image_name)');

        $statement->bindValue(':name', $name, PDO::PARAM_STR);
        $statement->bindValue(':description', $description, PDO::PARAM_STR);
        $statement->bindValue(':ingredients', $ingredients, PDO::PARAM_STR);
        $statement->bindValue(':steps', $steps, PDO::PARAM_STR);
        $statement->bindValue(':temps', $temps, PDO::PARAM_STR);
        $statement->bindValue(':difficulty', $difficulty, PDO::PARAM_STR);
        $statement->bindValue(':type', $type, PDO::PARAM_STR);
        $statement->bindValue(':image_name', $imageName, PDO::PARAM_STR);
        $statement->execute();
        return $statement;
    }


    // je récupère par ma BBD par ID
    public function findById($id)
    {
        $sql = 'SELECT 
        `id`,
        `name`,
        `description`,
        `ingredients`,
        `steps`,
        `difficulty`,
        `type`,
        `temps`,
        `image_name`,
        `created_at`

        FROM ' . self::TABLE_NAME . ' WHERE id = ' . $id;
        $query = $this->pdo->prepare($sql);
        $result = $query->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public function editRecette($id)
    {
        $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' WHERE id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateRecette($id, $name, $description, $ingredients, $steps, $difficulty, $type, $imageName)

    {
        $ql = "UPDATE " . self::TABLE_NAME . " 
        SET name = :name, 
            description = :description, 
            ingredients = :ingredients, 
            steps = :steps, 
            difficulty = :difficulty, 
            type = :type, 
            image_name = :image_name
        WHERE id = :id";
        $query = $this->pdo->prepare($ql);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':ingredients', $ingredients, PDO::PARAM_STR);
        $query->bindValue(':steps', $steps, PDO::PARAM_STR);
        $query->bindValue(':difficulty', $difficulty, PDO::PARAM_STR);
        $query->bindValue(':type', $type, PDO::PARAM_STR);
        $query->bindValue(':image_name', $imageName, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $query->execute();
        return $result;
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



    //je créer un fonction pour compter les pages courantes 
    public function findByPage($page, $order, $research, $type)
    {   // On détermine le nombre d'articles par page
        $parPage = 10;

        $pageDebut = ($page - 1) * $parPage;

        if ($order == 1) {
            $order = 'DESC';
        } else {
            $order = 'ASC';
        }

        if ($type == 1) {
            $type = 'entrer';
        }
        if ($type == 2) {
            $type = 'plats';
        }
        if ($type == 3) {
            $type = 'desserts';
        }

        if ($research != null) {
            $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' 
            WHERE type LIKE "%' . $research . '%" OR name LIKE "%' . $research . '%" OR ingredients LIKE "%' . $research . '%"
            ORDER BY `id` ' . $order;
        } elseif ($type != null) {
            $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' 
            WHERE type LIKE "%' . $type . '%"
            ORDER BY `id` ' . $order;
        } else {
            $sql = 'SELECT
                `id`
                ,`name`
                ,`description`
                ,`ingredients`
                ,`steps`
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
     * Get the value of ingredients
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Set the value of ingredients
     *
     * @return  self
     */
    public function setIngredients($ingredients)
    {
        $this->ingredient = $ingredients;

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

    /**
     * Get the value of steps
     */
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * Set the value of steps
     *
     * @return  self
     */
    public function setSteps($steps)
    {
        $this->steps = $steps;

        return $this;
    }

    /**
     * Get the value of imageName
     */
    public function getimageName()
    {
        return $this->imageName;
    }

    /**
     * Set the value of imageName
     *
     * @return  self
     */
    public function setimageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }
}
