<?php

    class Citizen
    {   
        public static function createTable()
        {
            //estabelecendo conexão
            $cnnct = Connection::getCnnct();

            //verificando se a tabela existe
            $sql = "SELECT 1 FROM information_schema.tables WHERE table_schema = 'gesuas' AND table_name = 'citizens'";

            $sql = $cnnct->prepare($sql);
            $sql->execute();
            
            if($sql->fetchObject('Citizen')){
                return true;
            }

            //caso não exista, cruia ela
            $sql = "CREATE TABLE citizens (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL, nis VARCHAR(11) UNIQUE)";

            $sql = $cnnct->prepare($sql);
            $sql->execute();

            return true;
        }

        public static function getCitizendByNis($nis)
        {
            $cnnct = Connection::getCnnct();

            //query
            $sql = "SELECT * FROM citizens WHERE nis = :nis ORDER BY id DESC";
            $sql = $cnnct->prepare($sql);
            $sql->bindValue(':nis', $nis, PDO::PARAM_STR);
            $sql->execute();

            $result = array();

            while ($row = $sql->fetchObject('Citizen')) {
                $result[] = $row;
            }

            if(!$result){
                return false;
            }

            return $result;
        }

        public static function create($name, $nis)
        {
            $cnnct = Connection::getCnnct();
            
            //query
            $sql = "INSERT INTO citizens (name, nis) VALUES (:name, :nis)";
            
            $sql = $cnnct->prepare($sql);
            $sql->bindValue(':name', $name, PDO::PARAM_STR);
            $sql->bindValue(':nis', $nis, PDO::PARAM_STR);
            $result = $sql->execute();
            
            if(!$result){
                throw new Exception("Erro ao criar registro");
            }

            return true;
        }
    }