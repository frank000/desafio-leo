<?php

class Db
{
    private $pdo;


    public static function getInstace()
    {
        if(!isset($pdo))
        {
            $pdo = mysqli_connect("db", "root", "phprs") or die(mysqli_error());
        }
        return $pdo;
    }

}