<?php

require_once "../Config.php";

/**
 * Base d'un modèle
 */
abstract class Model
{
    private static $db = null;
    /**
     * Retourne une connexion à la base
     * @return PDO
     */
    protected static function getDB()
    {
        if (self::$db === null) {
            $dsn = Config::DB_TYPE . ':host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME;
            self::$db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

            // Génère une exception lorsqu'une erreur se produit
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$db;
    }
}
