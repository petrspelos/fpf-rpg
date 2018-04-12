<?php
    class NewAccountPage extends Controller{
        public static function LoadExecute() {
            if(self::isLoggedIn())
            {
                echo "<script>goTo('home')</script>";
                die();
            }

            if(isset($_POST['registerForm']))
            {
                self::ValidateRegistration();
            }
        }

        public static function ValidateRegistration() {
            $username = $_POST['username'];
            $password = $_POST['userpassword'];
            $password2 = $_POST['userpassword2'];

            $valid[] = false;
            $valid[] = false;
            $valid[] = false;
            $mistakes = array();

            // Check if username is valid
            if(strlen($username) >= 3 && strlen($username) <= 32 && !preg_match("/[^a-z0-9]/", $username))
            {
                $username = strtolower($username);
                $result = self::query("SELECT * FROM users WHERE username=:username", array(':username'=>$username));
                if(empty($result))
                {
                    $valid[0] = true;
                }
                else
                {
                    $mistakes[] = "The $username username is already taken.";
                }
            }
            else
            {
                $mistakes[] = "Your username must be between 3 and 32 characters in length and may contain only numbers and letter of the English alphabet.";
            }

            // Check if passwords match
            if($password == $password2 && strlen($password) > 0 && strlen($password) <= 30)
            {
                $valid[1] = true;
            }
            else
            {
                $mistakes[] = "Your passwords don\'t match.";
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
                    $mistakes[] = "The CAPTCHA check failed. You\'re not a robot, are you?";
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
                'secret' => CAPTCHA_SECRET,
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