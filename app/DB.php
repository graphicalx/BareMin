<?php

namespace App;

use PDO;

class DB {

    public static $DBH;

    public static function getDBH()
    {

        if (!is_null(self::$DBH))
            return self::$DBH;

        $configDb = \Config\Db::$db;

        try {
            # MySQL with PDO_MYSQL
            $DBH = new PDO("mysql:host=" . $configDb['host'] . ";dbname=" . $configDb['name'], $configDb['user'], $configDb['pass']);
            $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        self::$DBH = $DBH;

        return $DBH;
    }



}