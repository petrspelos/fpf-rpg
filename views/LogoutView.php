<?php

    if(isset($_POST['Logout']))
    {
        Logout::LogUserOut();
    }

?>
<h1>Opravdu se chcete odhlásit?</h1>
<form action="" method="POST">
    <input type="checkbox" name="alldevices" value="alldevices"> Odhlásit ze všech zařízení?<br>
    <input type="submit" name="Logout" value="Odhlásit">
</form>