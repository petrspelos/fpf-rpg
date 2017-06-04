<?php

    class Settings extends Controller{
        public static function LoadExecute(){
            $user_id = self::isLoggedIn();
            $username = self::query("SELECT username FROM users WHERE ID=:ID", array(':ID'=>$user_id))[0]['username'];

            echo "<script>username = '$username'; UpdateUI();</script>";

            // Check if a Game exists for this user
            if(self::query("SELECT * FROM students WHERE user_id=:ID", array(':ID'=>$user_id)))
            {
                // User does have a students going
                // Check if the Game ended for them (ending != 0)
                if(self::query("SELECT ending FROM students WHERE user_id=:ID", array(':ID'=>$user_id))[0]['ending'] == 0)
                {
                    // The user is still playing the game, let's Load his/her information
                    self::LoadUserGame();
                }
                else
                {
                    // The user has already finished their game.
                    die("You already finished the game. Congratulations!");
                }
            }
            else
            {
                // User doesn't have a students, creating a new one
                self::query("INSERT INTO students VALUES (null, 'http://beachbutlerz.com/wp-content/uploads/2015/02/placeholder-woman-220x220.png', '0', '100', '100', '80', '0', :user_id)", array(':user_id'=>$user_id));
                self::LoadUserGame();
            }
        }

        public static function LoadUserGame(){
            $std = self::query("SELECT avatar FROM students WHERE user_id=:ID", array(':ID'=>self::isLoggedIn()));
            $a = $std[0]['avatar'];
            echo "<script>LoadGameValues('$a');</script>";
        }

        public static function ChangeAvatar($avatarURL){
            if(strlen($avatarURL) > 5 && strlen($avatarURL) < 200)
            {
                echo "<script>console.log('Length: OK');</script>";
                if(self::url_exists($avatarURL))
                {
                    echo "<script>console.log('URL: OK');</script>";
                    self::query("UPDATE students SET avatar=:avatarURL WHERE user_id=:user_id", array(':user_id'=>self::isLoggedIn(), ':avatarURL'=>$avatarURL));
                    echo "<script>window.location = 'settings';</script>";
                }
                else
                {
                    echo "<script>console.log('URL: 404');</script>";
                }
            }
        }

        public static function url_exists($url) {
            if (!$fp = curl_init($url)) return false;
            return true;
        }
    }

?>