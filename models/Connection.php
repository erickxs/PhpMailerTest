<?php

class Connection
{
    static public function connect()
    {
        // Connect
        $dbhost = IS_LOCAL ? LDB_HOST : DB_HOST;
        $dbname = IS_LOCAL ? LDB_DATABASE : DB_DATABASE;
        $dbuser = IS_LOCAL ? LDB_USERNAME : DB_USERNAME;
        $dbpass = IS_LOCAL ? LDB_PASSWORD : DB_PASSWORD;
        try {

            $link = new PDO(
                "mysql:host=" . $dbhost . ";dbname=" . $dbname,
                $dbuser,
                $dbpass
            );

            // $link->exec("set names utf8");  // utf8      Acepta caracteres, acentos y simbolos
            $link->exec("set names utf8mb4");  // utf8mb4   Acepta emoticons y otros caracteres
        } catch (PDOException $e) {

            die("Error: " . $e->getMessage());
        }

        return $link;
    }
}
