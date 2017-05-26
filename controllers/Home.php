<?php

    class Home extends Controller{
        public static function LoadExecute(){
            $username = self::query("SELECT username FROM users WHERE ID=:ID", array(':ID'=>self::isLoggedIn()))[0]['username'];
            echo "<script>username = '$username'; UpdateUI();</script>";
        }
    }

?>