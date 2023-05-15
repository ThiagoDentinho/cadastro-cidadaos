<?php

    abstract class Connection
    {
        private static $cnnct;

        public static function getCnnct()
        {
            if(self::$cnnct == null){

                $db_connection = 'mysql';
                $db_host = 'localhost';
                $db_database = 'gesuas';
                $bd_username = 'root';
                $dsn = 'mysql:host=localhost;dbname=gesuas';
                

                $dsn = $db_connection . ':host=' . $db_host . ';dbname=' . $db_database;

                try {
                    self::$cnnct = new PDO($dsn, $bd_username, '');

                } catch (PDOException $e) {
                    echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
                }
            }

            return self::$cnnct;
        }
    }