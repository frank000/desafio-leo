<?php

class Db
{
    public static $pdo;
    private $dbName = 'phprs';


    public static function getInstace()
    {
        if(!isset(self::$pdo))
        {
            self::$pdo = new PDO('mysql:host=mysql-base;dbname=phprs;charset=utf8', "root", "phprs");
            self::$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }

}