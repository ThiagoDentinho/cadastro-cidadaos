<?php

    class Citizen
    {
        public static function getAll()
        {
            $cnnct = Connection::getCnnct();

            $sql = "SELECT * FROM citizens ORDER BY id DESC";
            $sql = $cnnct->prepare($sql);
            $sql->execute();

            $result = array();

            while ($row = $sql->fetchObject('Citizen')) {
                $result[] = $row;
            }

            if(!$result){
                throw new Exception("Nenhum registro");
            }

            return $result;
        }
    }