<?php

    class Database {

        private static function connect(){
            $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
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

        public static function isLoggedIn() {
            if(isset($_COOKIE['FPFRPG']))
            {
                if(self::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['FPFRPG']))))
                {
                    $userid = self::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['FPFRPG'])))[0]['user_id'];
                    
                    if(isset($_COOKIE['FPFRPG_']))
                    {
                        return $userid;    
                    }
                    else
                    {
                        $cstrong = true;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        self::query('INSERT INTO login_tokens VALUES (null, :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
                        self::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['FPFRPG'])));

                        echo "COOKIE SETTING HERE";
                        setcookie("FPFRPG", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("FPFRPG_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                        return $userid; 
                    }
                    
                }
            }
            return false;
        }
    }

?>