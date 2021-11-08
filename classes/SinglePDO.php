<?php
class singlePDO
{
    private static $_instance = null;

    const DB_HOST = 'localhost';
    const DB_NAME = 'library_db';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND    => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION
    ];

    public static function getInstance()
    {
        if (!self::$_instance instanceof PDO)
        {
            try {
                self::$_instance = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME, self::DB_USER, self::DB_PASSWORD, self::OPTIONS);
            } catch(PDOException $e) {
                echo 'Erreur : '.$e->getMessage().'<br />';
            }
        }
        return self::$_instance;
    }
}