<?php

    class Database {

        private static function connect(){
            $pdo = new PDO('mysql:host=localhost;dbname=fpfrpg', DB_USERNAME, DB_PASSWORD);
            return $pdo;
        }
        
        // TODO: Query is too abstract, go for SET and GET functions instead
        public static function query($query, $params = array()){
            $statement = self::connect()->prepare($query);
            $statement->execute($params);
            if(explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetchAll();
                return $data;
            }
        }
    }

?>