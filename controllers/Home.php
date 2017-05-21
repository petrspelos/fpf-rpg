<?php

    class Home extends Controller{
        public static function LoadExecute(){
            if(self::isLoggedIn())
            {
                $username = self::query("SELECT username FROM users WHERE ID=:ID", array(':ID'=>self::isLoggedIn()))[0]['username'];
                echo "Logged in as $username";
            }
            else
            {
                echo "Not logged in";
            }
        }

    }

?>