<?php

namespace App\database;

use PDOException;
use PDO;

class Database
{
    private $config;
    private $pdo;

    /**
     * THE CONSTRUCTOR
     */
    public function __construct()
    {
        $this->getconfig();
        $this->connect();
    }

    /**
     * Retrieve the config from the config.ini file
     */
    private function getconfig()
    {
        // On récupere les identifiants de la Base de données
        $config = parse_ini_file('config.ini', true);
        // Erreur pour vor si le fichier n'existe pas 
        if (!$config) {
            throw new \Exception("Le fichier config.ini n'existe pas");
        }
        $this->config = $config;
    }

    /**
     * Connect to the DataBase
     */

    // instance singletonPattern
    private static $instance = null;

    // Connexion a la base de données
    public function connect()
    {
        //condition singletonPattern
        if (self::$instance === null) {
            try {
                self::$instance = new PDO('mysql:host=' . $this->config["DB_HOST"] . ';dbname=' . $this->config["DB_NAME"], $this->config["DB_USERNAME"], $this->config["DB_PASSWORD"]);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Échec lors de la connexion : ' . $e->getMessage();
            }
        }
        $this->pdo = self::$instance;
    }
    public function getPDO()
    {
        return self::$instance;
    }
}
