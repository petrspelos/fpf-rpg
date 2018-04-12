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
                    $cstrong = TRUE;
                    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                    $user_id = self::query("SELECT ID FROM users WHERE username=:username", array(':username'=>$username))[0]['ID'];
                    self::query("INSERT INTO login_tokens VALUES (null, :token, :user_id)", array(':token'=>sha1($token), ':user_id'=>$user_id));

                    setcookie("FPFRPG", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                    setcookie("FPFRPG_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                    ob_flush();

                    echo "<script>window.location = 'home';</script>";
                }
                else
                {
                    self::LoginErr("Invalid password", $username);
                }
            }
            else
            {
                self::LoginErr("Invalid username", $username);
            }
        }

        public static function LoginErr($reason, $username)
        {
            echo "<script>formState = {'username': '".$username."', 'success': false, 'reason': '".$reason."'};</script>";
        }
    }

?>