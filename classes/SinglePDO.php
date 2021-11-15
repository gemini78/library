<?php

/**
 * Manage the BDD
 * Use singeton pattern
 */
class singlePDO
{
    private static $_instance = null;

    const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND    => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION
    ];

    public static function getInstance()
    {
        if (!self::$_instance instanceof PDO)
        {
            try {
                self::$_instance = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD, self::OPTIONS);
            } catch(PDOException $e) {
                echo 'Erreur : '.$e->getMessage().'<br />';
            }
        }
        return self::$_instance;
    }
}