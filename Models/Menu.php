<?php

require_once "../Core/Model.php";

/**
 * Modèle des menu (catégories et plats)
 */
class Menu extends Model
{
    /**
     * Retourne tout les catégories avec le nombre de plats par catégories
     * @return array
     */
    public static function getAllCategories()
    {
        $db = self::getDB();
        $sth = $db->query('SELECT COUNT(d.catCode) as ndishes, c.catcode, c.name, c.txt, c.img FROM category c JOIN dish d on c.catcode = d.catcode GROUP BY c.catcode ORDER BY c.pos');
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retourne tout les plats
     * @return array
     */
    public static function getAllDishes()
    {
        $db = self::getDB();
        $sth = $db->query('SELECT d.id, d.name, d.txt, d.price, d.img, d.catcode FROM dish d ORDER BY d.price');
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retourne les plats par catégorie
     * @return array
     */
    public static function getDishesByCat($catCode)
    {
        $db = self::getDB();
        $sth = $db->prepare('SELECT d.id, d.name, d.txt, d.price, d.img, d.catcode FROM dish d WHERE d.catcode = ? ORDER BY d.price');
        $sth->execute([ $catCode ]);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}
