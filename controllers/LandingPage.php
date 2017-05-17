<?php

    class LandingPage extends Controller{
        public static function LoadExecute(){
            if(isset($_GET['act']))
            {
                if($_GET['act'] == 'reg')
                {
                    echo "<script>$( document ).ready(function() {ShowSnackbar('Registrace proběhla úspěšně! Můžete se přihlásit.');});</script>";
                }
            }
        }
    }

?>