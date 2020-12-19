<?php

require_once "../Core/Model.php";

/**
 * Modèle utilisateur
 */
class User extends Model
{
    /**
     * Retourne tout les utilisateurs
     * @return array
     */
    public static function getAll()
    {
        $db = self::getDB();
        $sth = $db->query('SELECT pseudo, email, passwd FROM usercred');
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retourne un utilisateur
     * @param string $pseudo Le pseudo de l'utilisateur
     * @return array
     */
    public static function getOne($pseudo)
    {
        $db = self::getDB();
        $sth = $db->prepare("SELECT pseudo, email, passwd FROM usercred WHERE pseudo = ?");
        $sth->execute([ $pseudo ]);
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Cherche les utilisateurs ayant le même pseudo ou email
     * @param string $pseudo Le pseudo
     * @param string $email L'email
     * @return array
     */
    public static function findByPseudoOrEmail($pseudo, $email)
    {
        $db = self::getDB();
        $sth = $db->prepare("SELECT pseudo, email, passwd FROM usercred WHERE pseudo = ? or email = ?");
        $sth->execute([ $pseudo, $email ]);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Ajoute un utilisateur
     * @param string $pseudo Le pseudo
     * @param string $email L'email
     * @param string $passwd Le mot de passe (encrypté)
     */
    public static function addOne($pseudo, $email, $passwd) {
        $db = self::getDB();
        $sth = $db->prepare("INSERT INTO usercred(pseudo, email, passwd) VALUES (?, ?, ?)");
        $sth->execute([ $pseudo, $email, $passwd ]);
    }
}
