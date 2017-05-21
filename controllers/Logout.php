<?php

    class Logout extends Controller{
        public static function LoadExecute(){
            if(!self::isLoggedIn())
            {
                header("Location: landing-page");
                die();
            }
        }

        public static function LogUserOut()
        {
            if(isset($_POST['alldevices']))
            {
                self::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>self::isLoggedIn()));
            }
            else
            {
                if(isset($_COOKIE['FPFRPG']))
                {
                    self::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['FPFRPG'])));
                }
                setcookie('FPFRPG', '1', time()-3600);
                setcookie('FPFRPG_', '1', time()-3600);
            }
        }
    }

?>