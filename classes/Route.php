<?php

    class Route{

        public static $validRoutes = array();

        public static function set($route, $function){
            self::$validRoutes[] = $route;

            if($_GET['url'] == $route) {
                $function->__invoke();
            }


            //print_r(self::$validRoutes);


        }

        public static function finalize(){
            $site = $_GET['url'];
            $valid = false;
            foreach(self::$validRoutes as $route)
            {
                if($site == $route)
                {
                    $valid = true;
                }
            }
            if(!$valid)
            {
                header("Location: 404");
                die();
            }
        }
    }

?>