<?php

    class Login
    {
        public static function isLoggedIn()
            {
                if(isset($_COOKIE['OSFID']))
                {
                    if(DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['OSFID']))))
                    {
                        $userid = DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['OSFID'])))[0]['user_id'];
                        
                        if(isset($_COOKIE['OSFID_']))
                        {
                            return $userid;    
                        }
                        else
                        {
                            $cstrong = true;
                            $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                            DB::query('INSERT INTO login_tokens VALUES (null, :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
                            DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['OSFID'])));

                            setcookie("OSFID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                            setcookie("OSFID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                            return $userid; 
                        }
                        
                    }
                }

                return false;
            }
    }

?>