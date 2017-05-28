<?php
    // KDYŽ UŽIVATEL NENÍ PŘIHLÁŠENÝ, POŠLE HO TO ZPĚT
    // NA LANDING-PAGE, TÍM PÁDEM MŮŽEŠ PŘEDPOKLÁDAT
    // ŽE UŽIVATEL 100% JE PŘIHLÁŠEN
  if(!self::isLoggedIn())
  {
      header('Location: landing-page');
      die();
  }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FPF RPG</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Material Design -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-red.min.css">

    <style>
    /* SUM CSS, MŮŽEŠ IGNOROVAT, MŮŽEŠ PŘIPISOVAT, YOUR CHOICE */
        body {
            background-color: #eee;
            padding: 0px;
        }

        .profile-image{
          width: 100%;
          box-shadow: 0px 0px 3px 0px rgba(0,0,0,0.5);
        }

        .main-choices{
          width: 100%;
        }
    </style>
</head>
<!--
      ===========================================================================
                                      BODY
      ===========================================================================
    -->

<body>
    <?php echo "<script>var gameVersion = '".GAME_VERSION."';</script>";?>
        <!-- Simple header with fixed tabs. -->
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
            mdl-layout--fixed-tabs">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title">Profil hráče</span>
                </div>
            </header>
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">Menu</span>
                <button class="mdl-button mdl-js-button " onclick="goTo('home');">
                    Domů
                </button>
                <button class="mdl-button mdl-js-button " onclick="goTo('logout');">
                    Odhlásit se
                </button>
            </div>
            <main class="mdl-layout__content">
                <div id="printContent">
                </div>
            </main>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script>
          var username = "";

          function goTo(link) {
              window.location = link;
          }

          function UpdateUI(){
            $("#usernameTabTitle").html(username);
          }

          function LoadGameValues(c,m,h,s,a,sc,hc){
            $('#profileIMG').attr('src', a);
            $('#cval').html(c);
            $('#mval').html(m + ' CZK');
            $('#hval').html(h + '%');
            $('#sval').html(s + '%');
            $('#hcval').html(hc + ' CZK / 100%');
            $('#scval').html(sc + ' CZK / 100%');
          }

          function AddToPage(html){
            $("#printContent").append(html);
          }

        </script>
</body>

</html>