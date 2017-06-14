<?php

    class Home extends Controller{
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
                    self::CheckPlayerWorkStatus();
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

            // Check For Currently working players
            $workingPlayers = self::query("SELECT user_id FROM work_timers", array());
            foreach($workingPlayers as $player)
            {
                $uID = $player['user_id'];
                $u = self::query("SELECT username FROM users WHERE ID=:ID", array(':ID'=>$uID))[0]['username'];
                $a = self::query("SELECT avatar FROM students WHERE user_id=:ID", array(':ID'=>$uID))[0]['avatar'];
                echo "<script>AddWorkingPlayer('$a', '$u');</script>";
            }


            // Check For richest players
            $richPlayers = self::query("SELECT money, user_id, avatar FROM students ORDER BY money DESC LIMIT 3", array());
            foreach($richPlayers as $richPlayer)
            {
                $rpid = $richPlayer['user_id'];
                $ra = $richPlayer['avatar'];
                $rpu = self::query("SELECT username FROM users WHERE ID=:ID", array(':ID'=>$rpid))[0]['username'];
                $rpm = $richPlayer['money'];
                echo "<script>AddRichPlayer('$rpu', '$ra', $rpm);</script>";
            }
        }

        public static function LoadUserGame(){
            $std = self::query("SELECT * FROM students WHERE user_id=:ID", array(':ID'=>self::isLoggedIn()));
            $cfg = self::query("SELECT * FROM game_config WHERE ID=:ID", array(':ID'=>1));
            $c = $std[0]['credits'];
            $m = $std[0]['money'];
            $h = $std[0]['health'];
            $s = $std[0]['sanity'];
            $a = $std[0]['avatar'];
            $sc = $cfg[0]['sanity_cost'];
            $hc = $cfg[0]['health_cost'];
            echo "<script>LoadGameValues($c,$m,$h,$s,'$a',$sc,$hc);</script>";
            echo "<script>LoadingFinished();</script>";
        }

        public static function CheckPlayerWorkStatus(){
            $user_id = self::isLoggedIn();
            if(self::query("SELECT * FROM work_timers WHERE user_id=:ID", array(':ID'=>$user_id)))
            {
                // player is working
                // Should he be working?
                $fin = self::query("SELECT finish FROM work_timers WHERE user_id=:ID", array(':ID'=>$user_id))[0]['finish'];
                $date = new DateTime($fin);
                $now = new DateTime();

                if($date < $now)
                {
                    // Player finished their work, but didn't get the reward yet.
                    // Give reward and remove this work entry!
                    echo "<script>console.log('WORK IS DONE, You should be rewarded!');</script>";
                    // Add reward
                    $rewardMult = self::query("SELECT hours_worked FROM work_timers WHERE user_id=:ID", array(':ID'=>$user_id))[0]['hours_worked'];
                    $reward = $rewardMult * WORK_REWARD;
                    $userQuery = self::query("SELECT money, sanity FROM students WHERE user_id=:ID", array(':ID'=>$user_id));
                    $currentMoney = $userQuery[0]['money'];
                    $currentSanity = $userQuery[0]['sanity'];
                    $updatedMon = $currentMoney + $reward;
                    $updatedSan = self::clamp($currentSanity - (WORK_SANITY_DAMAGE * $rewardMult), 0, 100);
                    self::query("UPDATE students SET money=:czk, sanity=:snt WHERE user_id=:user_id", array(':user_id'=>$user_id, ':czk'=>$updatedMon, ':snt'=>$updatedSan));
                    self::query('DELETE FROM work_timers WHERE user_id=:userid', array(':userid'=>$user_id));
                    echo "<script>window.location = 'home';</script>";
                }
                else
                {
                    // Player is still working
                    echo "<script>SetWorkMode('$fin');</script>";
                }
            }
        }

        public static function StartWork($hours){
            $user_id = self::isLoggedIn();
            if(!self::query("SELECT * FROM work_timers WHERE user_id=:ID", array(':ID'=>$user_id)))
            {
                echo "<script>console.log('UserIsNotCurrentlyWorking: OK');</script>";
                
                if($hours > 0 && $hours < 9)
                {
                    echo "<script>console.log('User wants to work for $hours hours: VALID - OK');</script>";
                    $now = new DateTime();
                    $now->add(new DateInterval('PT'.$hours.'H0S'));
                    $timeToSave = date_format($now, 'Y-m-d H:i:s');
                    self::query("INSERT INTO work_timers VALUES (null, :hours, :finish_time, :user_id)", array(':hours'=>$hours, ':finish_time'=>$timeToSave, ':user_id'=>$user_id));
                    echo "<script>window.location = 'home';</script>";
                }
                else
                {
                    echo "<script>console.log('User wants to work for $hours hours: OUT OF BOUNDS! STOPPING EXECUTION');</script>";
                }
            }
            else
            {
                echo "<script>console.log('User Is Currently Working: Command goal changed to STOP WORKING');</script>";
                // You are already working, so this is basically you cancelling your work.
                self::query('DELETE FROM work_timers WHERE user_id=:userid', array(':userid'=>$user_id));
                echo "<script>window.location = 'home';</script>";
                die("Please wait...");
            }
        }

        public static function clamp($current, $min, $max) {
            return max($min, min($max, $current));
        }

        public static function BuySanity(){
            // check if the player has enough money
            $user_id = self::isLoggedIn();
            $user_money =  self::query("SELECT money FROM students WHERE user_id=:ID", array(":ID"=>$user_id))[0]['money'];
            $sanity_cost = self::query("SELECT sanity_cost FROM game_config WHERE ID=1")[0]['sanity_cost'];
            if($user_money >= $sanity_cost)
            {
                $user_money -= $sanity_cost;
                $new_sanity = 100;
                self::query("UPDATE students SET money=:czk, sanity=:snt WHERE user_id=:user_id", array(':user_id'=>$user_id, ':czk'=>$user_money, ':snt'=>$new_sanity));
            }
        }
    }

?>