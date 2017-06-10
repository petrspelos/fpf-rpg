<?php

    class ProfilePage extends Controller{
        public static function LoadExecute(){
            
          
				$userToDisplay = $_GET['user'];
				$playerId = self::query("SELECT ID FROM users WHERE username=:un", array(':un'=>$userToDisplay))[0]['ID'];
				$player = self::query("SELECT avatar, credits, money, health, sanity FROM students WHERE user_id=:ui", array(':ui'=>$playerId));
				$c = $player[0]['credits'];
				$a = $player[0]['avatar'];
				$m = $player[0]['money'];
				$h = $player[0]['health'];
				$s = $player[0]['sanity'];
				echo "<script>LoadGameValues($c,$m,$h,$s,'$a','$userToDisplay');</script>";
        }

        public static function AddToPage($html){
            echo "<script>AddToPage('$html')</script>";
        }
    }

?>