<?php

    class Login extends Controller{
        public static function LoadExecute(){
            if(self::isLoggedIn())
            {
                echo "<script>goTo('home')</script>";
                die();
            }
        }

        public static function LoginUser($username, $password)
        {
            if(self::query("SELECT * FROM users WHERE username=:username", array(':username'=>$username)))
            {
                if(password_verify($password, self::query("SELECT password FROM users WHERE username=:username", array(':username'=>$username))[0]['password']))
                {
                    echo "<script>console.log('Logged in');</script>";

                    $cstrong = TRUE;
                    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                    $user_id = self::query("SELECT ID FROM users WHERE username=:username", array(':username'=>$username))[0]['ID'];
                    self::query("INSERT INTO login_tokens VALUES (null, :token, :user_id)", array(':token'=>sha1($token), ':user_id'=>$user_id));

                    
                    setcookie("FPFRPG", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                    setcookie("FPFRPG_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                    echo "<script>window.location = 'home';</script>";
                }
                else
                {
                    self::LoginErr();
                }
            }
            else
            {
                self::LoginErr();
            }
        }

        public static function LoginErr()
        {
            echo "<script>error = true;</script>";
        }
    }

?>