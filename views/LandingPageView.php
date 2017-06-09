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
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="goTo('login');">
                        Příhlásit se
                        </button>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="goTo('create-account');">
                        Registrovat se
                        </button>
                      </div>
                                        <!--
                                    TASK LIST
                      -->
                      <ul class="task-list mdl-list">
                          <!-- TASK 5 -->
                          <li class="mdl-list__item mdl-list__item--three-line">
                              <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-avatar">code</i>
                            <span>Come on! Get in!</span>
                              <span class="mdl-list__item-text-body">
                              Přihlašování, přihlašovací tokeny, varování před cookies.
                            </span>
                              </span>
                              <span class="mdl-list__item-secondary-content">
                            
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-list__item-secondary-action" for="checkbox-1">
                              <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" disabled>
                            </label>
                          </span>
                          </li>
                          <!-- TASK END -->
                          <!-- TASK 4 -->
                          <li class="mdl-list__item mdl-list__item--three-line">
                              <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-avatar">code</i>
                            <span>Meat! Meat! MEAT! MORE PIG! <b>MORE PIG!</b></span>
                              <span class="mdl-list__item-text-body">
                              Registrace + CAPTCHA
                            </span>
                              </span>
                              <span class="mdl-list__item-secondary-content">
                            
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-list__item-secondary-action" for="checkbox-1">
                              <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked disabled>
                            </label>
                          </span>
                          </li>
                          <!-- TASK END -->
                          <!-- TASK 3 -->
                          <li class="mdl-list__item mdl-list__item--three-line">
                              <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-avatar">code</i>
                            <span>One page to rule them all</span>
                              <span class="mdl-list__item-text-body">
                              Připravit MVC (model, view, controller) architekturu pro jednotlivé stránky.
                            </span>
                              </span>
                              <span class="mdl-list__item-secondary-content">
                            
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-list__item-secondary-action" for="checkbox-1">
                              <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked disabled>
                            </label>
                          </span>
                          </li>
                          <!-- TASK END -->
                          <!-- TASK 2 -->
                          <li class="mdl-list__item mdl-list__item--three-line">
                              <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-avatar">code</i>
                            <span>Welcome to the game</span>
                              <span class="mdl-list__item-text-body">
                              Nastavit připojení k databázi, vytvořit abstrakci pro databázové příkazy.
                            </span>
                              </span>
                              <span class="mdl-list__item-secondary-content">
                            
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-list__item-secondary-action" for="checkbox-1">
                              <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked disabled>
                            </label>
                          </span>
                          </li>
                          <!-- TASK END -->
                          <!-- TASK 1 -->
                          <li class="mdl-list__item mdl-list__item--three-line">
                              <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-avatar">code</i>
                            <span>První krok</span>
                              <span class="mdl-list__item-text-body">
                              Propojení s FTP, Git repozitář, nahrání index stránky.
                            </span>
                              </span>
                              <span class="mdl-list__item-secondary-content">
                            
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-list__item-secondary-action" for="checkbox-1">
                              <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked disabled>
                            </label>
                          </span>
                          </li>
                          <!-- TASK END -->
                      </ul>
                      
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