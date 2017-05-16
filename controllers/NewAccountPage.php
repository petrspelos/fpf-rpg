<?php

    class NewAccountPage extends Controller{
        public static function test(){
            $result = self::query("SELECT * FROM users");
            print_r($result[1]['username']);
        }

        public static function LoadExecute(){
            self::test();
        }
    }

?>