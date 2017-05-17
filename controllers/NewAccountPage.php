<?php

    class NewAccountPage extends Controller{
        public static function test(){
            $result = self::query("SELECT * FROM users");
        }

        public static function LoadExecute(){
            echo "<div class='dev'><p>";

            if(isset($_POST['registerForm']))
            {
                self::ValidateRegistration();
            }

            echo "</p></div>";
        }

        public static function ValidateRegistration(){
            $username = $_POST['username'];
            $password = $_POST['userpassword'];
            $password2 = $_POST['userpassword2'];

            $valid[] = false;
            $valid[] = false;
            $valid[] = false;
            $mistakes = array();

            // Check if username is valid
            if(strlen($username) > 0 && strlen($username) <= 32)
            {
                $result = self::query("SELECT * FROM users WHERE username=:username", array(':username'=>$username));
                if(empty($result))
                {
                    $valid[0] = true;
                }
                else
                {
                    $mistakes[] = "Uživatel $username již existuje.";
                }
            }
            else
            {
                $mistakes[] = "Uživatelské jméno musí mít alespoň jeden znak a méně než 32 (včetně).";
            }

            // Check if passwords match
            if($password == $password2 && strlen($password) > 0 && strlen($password) <= 30)
            {
                $valid[1] = true;
            }
            else
            {
                $mistakes[] = "Vámi zadaná hesla se neshodují.";
            }

            if(!ISDEBUG)
            {
                // CAPTCHA CHECKING (skip if DEBUG)
                $res = self::post_captcha($_POST['g-recaptcha-response']);

                if ($res['success'])
                {
                    $valid[2] = true;
                }
                else
                {
                    $mistakes[] = "CAPTCHA nebyl úspěšně vyplněn.";
                }
            }
            else
            {
                $valid[2] = true;
            }

            // If everything is valid, register user
            if($valid[0] == true && $valid[1] == true && $valid[2] == true)
            {
                self::CompleteRegistration($username, $password);
            }
            else
            {
                for($i = 0; $i < 3; $i++)
                {
                    $valid[$i] = ($valid[$i]) ? 'true' : 'false';
                }

                echo "<script>ClearFeedback();</script>";
                foreach($mistakes as $mistake)
                {
                    echo "<script>AddFeedbackMessage('$mistake');</script>";
                }
                echo "<script>DisplayFeedback();</script>";
            }
        }

        public static function CompleteRegistration($username, $password) {
            self::query('INSERT INTO users VALUES (null, :username, :password)', array(':username'=>$username, ':password'=>password_hash($password, CRYPT_BLOWFISH)));
            echo "<script>RegistrationSuccess();</script>";
        }

        public static function post_captcha($user_response) {
            $fields_string = '';
            $fields = array(
                'secret' => '6LcLoiEUAAAAAO3FiBZlFVEpA4ZWS2VE8ek03ujr',
                'response' => $user_response
            );
            foreach($fields as $key=>$value)
            $fields_string .= $key . '=' . $value . '&';
            $fields_string = rtrim($fields_string, '&');

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

            $result = curl_exec($ch);
            curl_close($ch);

            return json_decode($result, true);
        }

    }

?>