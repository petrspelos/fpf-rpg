<?php

if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || $_SERVER['SERVER_PORT'] == 443 || ISDEBUG)
    {
        echo "<script>console.log('THIS SITE IS SECURE');</script>";
    }
    else
    {
        header('Location: https://' . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI']);
        die();
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
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
          body {
              background-color: #eee;
              padding: 0px;
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


        <!-- Uses a header that scrolls with the text, rather than staying
          locked at the top -->
        <div class="mdl-layout mdl-js-layout">
            <header class="mdl-layout__header mdl-layout__header--scroll">
                <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title"><i class="material-icons">accessibility</i><sup> Titulní Strana</sup></span>
                </div>
            </header>
            <main class="mdl-layout__content">
                <div class="page-content">
                  <!--
                    ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨
                                          PAGE CONTENT
                    ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨
                  -->                  
                  <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--1-col"></div>
                    <div class="mdl-cell mdl-cell--10-col">
                      <!--
                                    NAVIGATION BUTTONS
                      -->
                      <div class="task-list">
                        
                      </div>

                        <style>
                        .demo-card-square.mdl-card {
                          width: 100%;
                          height: 80%;
                        }
                        .demo-card-square > .mdl-card__title {
                          color: #fff;
                          background:
                            url('http://i.imgur.com/0m61z44.png') top left 50% no-repeat #46B6AC;
                          border: 1px solid rgba(0,0,0,0.2);
                        }
                        </style>

                        <div class="demo-card-square mdl-card mdl-shadow--2dp">
                          <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">FPF - RPG</h2>
                          </div>
                          <div class="mdl-card__supporting-text">
                            Staňte se studentem či studentkou vysoké školy ve strhující RPG hře FPF-RPG.
                          </div>
                          <div class="mdl-card__actions mdl-card--border">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" onclick="goTo('login');">
                            Příhlásit se
                            </button>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="goTo('create-account');">
                            Registrovat se
                            </button>
                          </div>
                        </div>
                      
                      <!--
                                  SNACKBAR SETUP
                        -->
                        <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
                          <div class="mdl-snackbar__text"></div>
                          <button class="mdl-snackbar__action" type="button"></button>
                        </div>
                        <script>
                        function ShowSnackbar(message)
                        {
                          var snackbarContainer = document.querySelector('#demo-toast-example');
                          var data = {message: message};
                          snackbarContainer.MaterialSnackbar.showSnackbar(data);
                        }
                        </script>
                        <!-- SNACKBAR END -->
                    </div>
                    <div class="mdl-cell mdl-cell--1-col"></div>
                  </div>
                </div>
            </main>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script>
        function goTo(link)
        {
          window.location = link;
        }
        </script>
  </body>
</html>